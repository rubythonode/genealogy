<pre class="is-paddingless"
    v-hljs>
    <code class="json">
{
    "routePrefix": "examples.table",
    "readSuffix": "data",
    "writeSuffix": null,
    "name": "Enso Vue Datatable Example",
    "icon": ["fab", "vuejs"],
    "crtNo": true,
    "buttons": [
        {
            "type": "global",
            "icon": "file-excel",
            "class": "is-outlined",
            "event": "excel",
            "label": "Excel"
        },
        {
            "type": "global",
            "icon": "plus",
            "class": "is-success",
            "event": "create",
            "label": "Create"
        },
        {
            "type": "row",
            "icon": "pencil-alt",
            "class": "is-warning",
            "event": "edit"
        },
        {
            "type": "row",
            "icon": "trash-alt",
            "class": "is-danger",
            "event": "destroy",
            "confirmation" : true,
            "message" : "This is your custom confirmation. Are you sure?"
        }
    ],
    "columns": [
        {
            "label": "Name",
            "name": "name",
            "data": "examples.name",
            "meta": [
                "searchable",
                "sortable"
            ]
        }, {
            "label": "Position",
            "name": "position",
            "data": "examples.position",
            "meta": [
                "searchable",
                "sortable",
                "clickable"
            ]
        }, {
            "label": "Seniority",
            "name": "seniority",
            "data": "examples.seniority",
            "enum": "App\\Http\\Controllers\\Examples\\SeniorityEnum",
            "meta": [
                "sortable"
            ]
        }, {
            "label": "Project",
            "name": "project",
            "data": "examples.project",
            "meta": [
                "searchable",
                "sortable",
                "render"
            ]
        }, {
            "label": "Salary",
            "name": "salary",
            "data": "examples.salary",
            "meta": [
                "searchable",
                "sortable",
                "total"
            ],
            "money": {}
        }, {
            "label": "Taxes",
            "name": "taxes",
            "data": "examples.taxes",
            "meta": [
                "searchable",
                "sortable",
                "total"
            ],
            "money": {}
        }, {
            "label": "Active",
            "name": "is_active",
            "data": "examples.is_active",
            "meta": [
                "boolean",
                "sortable"
            ]
        }, {
            "label": "Hired Since",
            "name": "hired_at",
            "data": "examples.hired_at",
            "meta": [
                "date",
                "sortable"
            ]
        }
    ]
}
    </code>
</pre>