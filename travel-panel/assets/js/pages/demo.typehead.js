$(document).ready(function () {
    var o,
        e =
            ($("#bloodhound").typeahead({ hint: !0, highlight: !0, minLength: 1 }, { name: "states", source: e }),
            new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.whitespace,
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: "https://raw.githubusercontent.com/twitter/typeahead.js/gh-pages/data/countries.json",
            })),
        e =
            ($("#prefetch").typeahead(null, { name: "countries", source: e }),
            new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace("value"),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                prefetch: "https://raw.githubusercontent.com/twitter/typeahead.js/gh-pages/data/films/post_1960.json",
                remote: { url: "../plugins/typeahead/data/%QUERY.json", wildcard: "%QUERY" },
            })),
        t =
            ($("#remote").typeahead(null, { name: "best-pictures", display: "value", source: e }),
            new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace("team"),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                identify: function (e) {
                    return e.team;
                },
                prefetch: "https://raw.githubusercontent.com/twitter/typeahead.js/gh-pages/data/nfl.json",
            }));
    $("#default-suggestions").typeahead(
        { minLength: 0, highlight: !0 },
        {
            name: "nfl-teams",
            display: "team",
            source: function (e, a) {
                "" === e ? a(t.get("Detroit Lions", "Green Bay Packers", "Chicago Bears")) : t.search(e, a);
            },
        }
    ),
        $("#custom-templates").typeahead(null, {
            name: "best-pictures",
            display: "value",
            source: e,
            templates: {
                empty: [
                    '<div class="typeahead-empty-message">',
                    "Unable to find any Best Picture winners that match the current query",
                    "</div>",
                ].join("\n"),
                suggestion: Handlebars.compile("<div><strong>{{value}}</strong> - {{year}}</div>"),
            },
        });
    var e = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace("team"),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: "https://raw.githubusercontent.com/twitter/typeahead.js/gh-pages/data/nba.json",
        }),
        a = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace("team"),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: "https://raw.githubusercontent.com/twitter/typeahead.js/gh-pages/data/nhl.json",
        });
    $("#multiple-datasets").typeahead(
        { highlight: !0 },
        {
            name: "nba-teams",
            display: "team",
            source: e,
            templates: { header: '<h5 class="league-name">NBA Teams</h5>' },
        },
        {
            name: "nhl-teams",
            display: "team",
            source: a,
            templates: { header: '<h5 class="league-name">NHL Teams</h5>' },
        }
    );
});
