export const CONFIGS = {
    benefit: {
        max: 6,
        layout: [2,2],
        fields: [
            {
                key: "icon",
                type: "icon",
                label: "Lucide Icon",
                placeholder: "e.g. zap",
                iconType: "lucide",
                previewDefault: "zap",
            },
            { key: "title", type: "text", label: "Title", placeholder: "" },
            { key: "desc", type: "textarea", label: "Description", rows: 2 },
        ],
    },

    industries: {
        max: null,
        layout: [2, "full"],
        fields: [
            {
                key: "icon",
                type: "icon",
                label: "Lucide Icon",
                placeholder: "e.g. building",
                iconType: "lucide",
                previewDefault: "building",
            },
            {
                key: "title",
                type: "text",
                label: "Title",
                placeholder: "e.g. Healthcare",
            },
            { key: "desc", type: "textarea", label: "Description", rows: 2 },
        ],
    },

    case_studies: {
        max: 6,
        layout: ["full", 2, 2],
        fields: [
            { key: "featured", type: "checkbox", label: "Featured Card" },
            {
                key: "metric",
                type: "text",
                label: "Metric *",
                placeholder: "+320% / 4x / $180K",
            },
            {
                key: "title",
                type: "text",
                label: "Title *",
                placeholder: "Organic Traffic",
            },
            {
                key: "tag1",
                type: "text",
                label: "Tag 1",
                placeholder: "E-commerce",
            },
            { key: "tag2", type: "text", label: "Tag 2", placeholder: "SEO" },
        ],
    },

    faqs: {
        max: 4,
        layout: [],
        fields: [
            { key: "question", type: "text", label: "Question *" },
            { key: "answer", type: "textarea", label: "Answer *", rows: 3 },
        ],
    },

    tech_stack: {
        max: null,
        layout: [2],
        fields: [
            {
                key: "icon",
                type: "icon",
                label: "Devicon Class",
                placeholder: "e.g. devicon-laravel-plain",
                iconType: "devicon",
                previewDefault: "devicon-devicon-plain",
            },
            {
                key: "title",
                type: "text",
                label: "Title",
                placeholder: "e.g. Laravel Development",
            },
        ],
    },
};
