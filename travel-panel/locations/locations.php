    <?php include_once __DIR__ . '/../includes/header.php'; ?>
    <?php include_once __DIR__ . '/../includes/sidebar.php'; ?>

<div class="content-page">
  <div class="content container-fluid">
    <div class="row">
      <!-- LEFT: Form -->
      <div class="col-md-4">
        <div class="card p-3">
          <h4 id="form-title">Add Location</h4>
          <form id="locationForm" enctype="multipart/form-data">
            <input type="hidden" name="id" id="loc-id" value="">
            <div class="mb-2">
              <label class="form-label">Name</label>
              <input type="text" id="loc-name" name="name" class="form-control" required>
            </div>
            <div class="mb-2">
              <label class="form-label">Slug</label>
              <input type="text" id="loc-slug" name="slug" class="form-control" required>
              <small id="slug-status" class="form-text"></small>
            </div>
            <div class="mb-2">
              <label class="form-label">Description</label>
              <textarea id="loc-desc" name="description" class="form-control" rows="4"></textarea>
            </div>
            <div class="mb-2">
              <label class="form-label">Image</label>
              <input type="file" id="loc-image" name="image" accept="image/*" class="form-control">
              <div id="img-preview" style="margin-top:10px;"></div>
            </div>

            <div class="d-flex gap-2">
              <button type="submit" id="save-btn" class="btn btn-primary">Save</button>
              <button type="button" id="cancel-edit" class="btn btn-light">Cancel</button>
            </div>

          </form>
        </div>
      </div>

      <!-- RIGHT: Listing -->
      <div class="col-md-8">
        <div class="card p-3">
          <div class="d-flex justify-between align-items-center mb-3">
            <h4>Locations</h4>
            <button id="refreshList" class="btn btn-sm btn-outline-primary">Refresh</button>
          </div>
          <div id="locationsList">
            <!-- filled by JS -->
            <div class="text-muted">Loading...</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <?php include_once __DIR__ . '/../includes/footer.php'; ?>

<!-- JS -->
<script>
(function(){
  const api = './locations_api.php';
  const form = document.getElementById('locationForm');
  const listEl = document.getElementById('locationsList');
  const saveBtn = document.getElementById('save-btn');
  const cancelBtn = document.getElementById('cancel-edit');
  const nameInput = document.getElementById('loc-name');
  const slugInput = document.getElementById('loc-slug');
  const idInput = document.getElementById('loc-id');
  const descInput = document.getElementById('loc-desc');
  const imageInput = document.getElementById('loc-image');
  const imgPreview = document.getElementById('img-preview');
  const slugStatus = document.getElementById('slug-status');

  // generate slug helper
  function generateSlug(text){
    return text.toString().toLowerCase().trim()
      .replace(/[^a-z0-9\s-]/g,'')
      .replace(/\s+/g,'-')
      .replace(/-+/g,'-');
  }

  // load list
  async function loadLocations(){
    listEl.innerHTML = '<div class="text-muted">Loading...</div>';
    try {
      const res = await fetch(api + '?action=read');
      const json = await res.json();
      if (!json.success) { listEl.innerHTML = '<div class="text-danger">Failed to load.</div>'; return; }
      renderList(json.locations);
    } catch (e) {
      console.error(e);
      listEl.innerHTML = '<div class="text-danger">Error loading list.</div>';
    }
  }

  function renderList(items){
    if (!items || items.length === 0) { listEl.innerHTML = '<div class="text-muted">No locations yet.</div>'; return; }
    const container = document.createElement('div');
    container.className = 'list-group';

    items.forEach(it => {
      const card = document.createElement('div');
      card.className = 'd-flex align-items-center p-2 border-bottom';

      const thumb = document.createElement('div');
      thumb.style.width = '96px';
      thumb.style.marginRight = '12px';
      if (it.image_path) thumb.innerHTML = `<img src="${it.image_path}" style="width:100%;border-radius:6px;" alt="">`;
      else thumb.innerHTML = `<div style="width:100%;height:64px;background:#f3f4f6;border-radius:6px;display:flex;align-items:center;justify-content:center;color:#9ca3af">No Image</div>`;

      const meta = document.createElement('div');
      meta.style.flex = '1';
      meta.innerHTML = `<div style="font-weight:600">${escapeHtml(it.name)}</div><div style="color:#6b7280">${escapeHtml(it.slug)}</div>`;

      const actions = document.createElement('div');
      actions.innerHTML = `
        <button class="btn btn-sm btn-outline-secondary btn-edit" data-id="${it.id}">Edit</button>
        <button class="btn btn-sm btn-outline-danger btn-delete" data-id="${it.id}">Delete</button>
      `;

      card.appendChild(thumb);
      card.appendChild(meta);
      card.appendChild(actions);
      container.appendChild(card);

      // attach events delegation later
    });

    listEl.innerHTML = '';
    listEl.appendChild(container);

    // add delegated listeners
    listEl.querySelectorAll('.btn-edit').forEach(btn => btn.addEventListener('click', onEdit));
    listEl.querySelectorAll('.btn-delete').forEach(btn => btn.addEventListener('click', onDelete));
  }

  function escapeHtml(s){ return String(s).replace(/[&<>"']/g, function(m){ return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]; }); }

  // edit
  async function onEdit(e){
    const id = e.currentTarget.dataset.id;
    // fetch single item from read endpoint result (could also call an endpoint)
    try {
      const res = await fetch(api + '?action=read');
      const json = await res.json();
      const item = (json.locations || []).find(x => String(x.id) === String(id));
      if (!item) { alert('Not found'); return; }
      idInput.value = item.id;
      nameInput.value = item.name;
      slugInput.value = item.slug;
      descInput.value = item.description || '';
      imgPreview.innerHTML = item.image_path ? `<img src="${item.image_path}" style="max-width:100%;border-radius:6px;">` : '';
      document.getElementById('form-title').textContent = 'Edit Location';
      window.scrollTo({top:0, behavior:'smooth'});
    } catch (err) {
      console.error(err);
      alert('Error loading item for edit');
    }
  }

  async function onDelete(e){
    if (!confirm('Delete this location?')) return;
    const id = e.currentTarget.dataset.id;
    try {
      const formData = new FormData();
      formData.append('action','delete');
      formData.append('id', id);
      const res = await fetch(api, { method:'POST', body: formData });
      const json = await res.json();
      if (!json.success) return alert(json.message || 'Delete failed');
      await loadLocations();
    } catch (err) {
      console.error(err);
      alert('Delete error');
    }
  }

  // slug auto from name
  nameInput.addEventListener('input', () => {
    const s = generateSlug(nameInput.value);
    slugInput.value = s;
    checkSlugDebounced();
  });

  // check slug availability
  let slugCheckTimeout = null;
  function checkSlugDebounced(){
    if (slugCheckTimeout) clearTimeout(slugCheckTimeout);
    slugCheckTimeout = setTimeout(checkSlugAvailability, 500);
  }
  async function checkSlugAvailability(){
    const slug = slugInput.value.trim();
    if (!slug) { slugStatus.textContent=''; return; }
    const id = idInput.value || '';
    try {
      const params = new URLSearchParams({ action:'check-slug', slug: slug });
      if (id) params.append('id', id);
      const res = await fetch('./locations_api.php?' + params.toString());
      const json = await res.json();
      if (json.success) {
        if (json.exists) { slugStatus.textContent = '❌ taken'; slugStatus.style.color = 'red'; }
        else { slugStatus.textContent = '✅ available'; slugStatus.style.color = 'green'; }
      } else slugStatus.textContent = '';
    } catch (err) {
      console.error(err);
    }
  }

  // preview image
  imageInput.addEventListener('change', () => {
    const f = imageInput.files[0];
    if (!f) { imgPreview.innerHTML = ''; return; }
    const url = URL.createObjectURL(f);
    imgPreview.innerHTML = `<img src="${url}" style="max-width:100%;border-radius:6px;">`;
  });

  // cancel/reset
  cancelBtn.addEventListener('click', resetForm);

  function resetForm(){
    form.reset();
    idInput.value = '';
    imgPreview.innerHTML = '';
    document.getElementById('form-title').textContent = 'Add Location';
    slugStatus.textContent = '';
  }

  // submit
  form.addEventListener('submit', async function(e){
    e.preventDefault();
    saveBtn.disabled = true;
    const fd = new FormData(form);
    fd.append('action', idInput.value ? 'update' : 'create');

    try {
      const res = await fetch(api, { method:'POST', body: fd });
      const json = await res.json();
      if (!json.success) { alert(json.message || 'Save failed'); saveBtn.disabled = false; return; }
      resetForm();
      await loadLocations();
      saveBtn.disabled = false;
    } catch (err) {
      console.error(err);
      alert('Save error');
      saveBtn.disabled = false;
    }
  });

  // refresh button
  document.getElementById('refreshList').addEventListener('click', loadLocations);

  // initial load
  loadLocations();
})();
</script>
