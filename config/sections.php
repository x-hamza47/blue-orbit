<?php


return [
    'relatedservices' => [
        'label' => 'Related Services',
        'allowed_for' => ['parent', 'sub'],
        'system' => true,
        'description' => 'Automatically shows sibling or child services.',
    ],
    'hero' => [
        'label' => 'Hero Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,
        'rules' => [
            'heading' => 'required|string|max:500',
            'subheading' => 'nullable|string|max:500',
            'input_placeholder' => 'nullable|string|max:255',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'review_text' => 'required|string',
            'reviewer_name' => 'required|string|max:100',
            'image' => 'nullable|string'
        ],
    ],
    'benefits' => [
        'label' => 'Benefits Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,
        'rules' => [
            'subheading' => 'nullable|string|max:500',
            'items' => 'required|array|min:1|max:9',
            'items.*.icon' => 'required|string|max:255',
            'items.*.title' => 'required|string|max:100',
            'items.*.desc' => 'required|string|max:120',
        ],
        'messages' => [
            'items.required'         => 'Add at least one benefit before saving.',
            'items.min'              => 'Add at least one benefit before saving.',
            'items.max'              => 'You can add up to 9 benefits only.',
            'subheading.max'         => 'Description cannot exceed 500 characters.',

            'items.*.icon.required'  => 'Item :position — icon is required.',
            'items.*.icon.max'       => 'Item :position — icon name is too long.',

            'items.*.title.required' => 'Item :position — title is required.',
            'items.*.title.max'      => 'Item :position — title cannot exceed 100 characters.',

            'items.*.desc.required'  => 'Item :position — description is required.',
            'items.*.desc.max'       => 'Item :position — description cannot exceed 120 characters.',
        ],
    ],

    'casestudy' => [
        'label' => 'Case Study Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,

        'rules' => [
            'heading_main' => 'required|string|max:255',
            'heading_highlight' => 'required|string|max:255',

            'items' => 'required|array|min:1|max:6',

            'items.*.metric' => 'required|string|max:50',
            'items.*.title' => 'required|string|max:255',

            'items.*.tag1' => 'nullable|string|max:50',
            'items.*.tag2' => 'nullable|string|max:50',

            'items.*.featured' => 'nullable|boolean',
        ],

        'messages' => [
            'items.required' => 'Add at least one case study item.',
            'items.min' => 'Add at least one case study item.',
            'items.max' => 'You can add up to 6 case study items only.',

            'items.*.metric.required' => 'Item :position — metric is required.',
            'items.*.title.required' => 'Item :position — title is required.',

            'items.*.tag1.max' => 'Item :position — Tag 1 max 50 characters.',
            'items.*.tag2.max' => 'Item :position — Tag 2 max 50 characters.',
        ],
    ],
    'challenges' => [
        'label' => 'Challenges Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,

        'rules' => [
            'heading' => 'required|string|max:255',
            'subheading' => 'nullable|string|max:500',

            'items' => 'required|array|min:1|max:10',

            'items.*.issue' => 'required|string|max:1000',
            'items.*.fixed' => 'required|string|max:1000',
            'items.*.result' => 'required|string|max:255',
        ],

        'messages' => [
            'heading.required' => 'Section heading is required.',

            'items.required' => 'Add at least one challenge item.',
            'items.min' => 'Add at least one challenge item.',
            'items.max' => 'You can add up to 10 challenges only.',

            'items.*.issue.required' => 'Challenge :position — issue is required.',
            'items.*.fixed.required' => 'Challenge :position — fixed solution is required.',
            'items.*.result.required' => 'Challenge :position — result line is required.',
        ],
    ],


    'cta' => [
        'label'       => 'Call To Action',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,
        'rules' => [
            'heading'     => 'required|string|max:500',
            'subheading'  => 'nullable|string|max:500',
            'button_text' => 'required|string|max:100',
            'button_link' => 'nullable|string|max:255',
        ],
        'messages' => [
            'heading.required'     => 'Heading is required.',
            'heading.max'          => 'Heading cannot exceed 500 characters.',
            'button_text.required' => 'Button text is required.',
            'button_text.max'      => 'Button text cannot exceed 100 characters.',
            'button_link.max'      => 'Button link cannot exceed 255 characters.',
        ],
    ],

    'faqs' => [
        'label'       => 'FAQs Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,
        'rules' => [
            'heading'         => 'required|string|max:255',
            'subheading'      => 'nullable|string|max:500',
            'support_title'   => 'nullable|string|max:255',
            'support_text'    => 'nullable|string|max:500',
            'support_email'   => 'required|email|max:255',
            'faqs'            => 'required|array|min:1|max:4',
            'faqs.*.question' => 'required|string|max:255',
            'faqs.*.answer'   => 'required|string',
        ],
        'messages' => [
            'heading.required'          => 'Section heading is required.',
            'heading.max'               => 'Heading cannot exceed 255 characters.',
            'support_email.required'    => 'Support email is required.',
            'support_email.email'       => 'Support email must be a valid email address.',
            'faqs.required'             => 'Add at least one FAQ before saving.',
            'faqs.min'                  => 'Add at least one FAQ before saving.',
            'faqs.max'                  => 'You can add up to 4 FAQs only.',
            'faqs.*.question.required'  => 'FAQ :position — question is required.',
            'faqs.*.question.max'       => 'FAQ :position — question cannot exceed 255 characters.',
            'faqs.*.answer.required'    => 'FAQ :position — answer is required.',
        ],
    ],
    'tech' => [
        'label' => 'Technologies Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,
        'rules' => [
            'heading' => 'nullable|string|max:255',
            'subheading' => 'nullable|string|max:500',
            'items' => 'required|array|min:1',
            'items.*.icon' => 'required|string|max:50',
            'items.*.title' => 'required|string|max:255',
        ],
        'messages' => [
            'items.required' => 'Add at least one technology item.',
            'items.min' => 'Add at least one technology item.',

            'items.*.icon.required' => 'Item :position — icon is required.',
            'items.*.title.required' => 'Item :position — title is required.',

            'items.*.icon.max' => 'Item :position — icon name is too long.',
            'items.*.title.max' => 'Item :position — title cannot exceed 255 characters.',
        ],
    ],

    'industries' => [
        'label'       => 'Industries Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,
        'rules' => [
            'subheading'    => 'nullable|string|max:500',
            'items'         => 'required|array|min:1|max:8',
            'items.*.icon'  => 'required|string|max:100',
            'items.*.title' => 'required|string|max:255',
            'items.*.desc'  => 'required|string|max:1000',
        ],
        'messages' => [
            'items.required'         => 'Add at least one industry before saving.',
            'items.min'              => 'Add at least one industry before saving.',
            'items.max'              => 'You can add up to 8 industries only.',
            'subheading.max'         => 'Description cannot exceed 500 characters.',

            'items.*.icon.required'  => 'Item :position — icon is required.',
            'items.*.icon.max'       => 'Item :position — icon name is too long.',

            'items.*.title.required' => 'Item :position — title is required.',
            'items.*.title.max'      => 'Item :position — title cannot exceed 255 characters.',

            'items.*.desc.required'  => 'Item :position — description is required.',
            'items.*.desc.max'       => 'Item :position — description cannot exceed 1000 characters.',
        ],
    ],

    'process' => [
        'label' => 'Process Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,

        'rules' => [
            'heading' => 'required|string|max:255',
            'subheading' => 'nullable|string|max:500',

            'items' => 'required|array|min:1|max:4',

            'items.*.icon' => 'required|string|max:50',
            'items.*.step' => 'nullable|string|max:10',
            'items.*.title' => 'required|string|max:255',
            'items.*.desc' => 'required|string|max:1000',
        ],

        'messages' => [
            'items.required' => 'Add at least one step.',
            'items.min' => 'Add at least one step.',
            'items.max' => 'Maximum 4 steps allowed.',

            'items.*.title.required' => 'Step :position — title is required.',
            'items.*.desc.required' => 'Step :position — description is required.',
        ],
    ],

    'roicalculator' => [
        'label'       => 'ROI Calculator',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,
        'rules' => [
            'button_text'          => 'required|string|max:100',
            'disclaimer'           => 'nullable|string|max:255',
            'budget_coefficient'   => 'required|numeric|min:0',
            'traffic_coefficient'  => 'required|numeric|min:0',
            'revenue_multiplier'   => 'required|numeric|min:0',
            'industries'           => 'required|array|min:1|max:10',
            'industries.*.label'   => 'required|string|max:100',
            'industries.*.value'   => 'required|string|max:100',
            'industries.*.multiplier' => 'required|numeric|min:0',
        ],
        'messages' => [
            'button_text.required'             => 'Button text is required.',
            'budget_coefficient.required'      => 'Budget coefficient is required.',
            'traffic_coefficient.required'     => 'Traffic coefficient is required.',
            'revenue_multiplier.required'      => 'Revenue multiplier is required.',
            'industries.required'              => 'Add at least one industry.',
            'industries.min'                   => 'Add at least one industry.',
            'industries.max'                   => 'You can add up to 10 industries only.',
            'industries.*.label.required'      => 'Industry :position — label is required.',
            'industries.*.value.required'      => 'Industry :position — value key is required.',
            'industries.*.multiplier.required' => 'Industry :position — multiplier is required.',
        ],
    ],

    'stats' => [
        'label' => 'Stats Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,

        'rules' => [
            'heading' => 'required|string|max:255',

            'items' => 'required|array|min:1|max:6',

            'items.*.value' => 'required|string|max:50',
            'items.*.label' => 'required|string|max:100',
        ],

        'messages' => [
            'heading.required' => 'Section heading is required.',

            'items.required' => 'Add at least one stat item.',
            'items.min' => 'Add at least one stat item.',
            'items.max' => 'You can add up to 6 items only.',

            'items.*.value.required' => 'Stat :position — value is required.',
            'items.*.value.max' => 'Stat :position — value is too long.',

            'items.*.label.required' => 'Stat :position — label is required.',
            'items.*.label.max' => 'Stat :position — label is too long.',
        ],
    ],

    'custom' => [
        'label'       => 'Custom Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,

        'rules' => [
            'heading' => 'required|string|max:255',

            'paragraphs' => 'required|array|min:1|max:10',
            'paragraphs.*.text' => 'required|string|max:2000',
        ],

        'messages' => [
            'heading.required' => 'Heading is required.',
            'heading.max'      => 'Heading cannot exceed 255 characters.',

            'paragraphs.required' => 'At least one paragraph is required.',
            'paragraphs.min'      => 'Add at least one paragraph.',
            'paragraphs.max'      => 'You can add up to 10 paragraphs only.',

            'paragraphs.*.text.required' => 'Paragraph text is required.',
            'paragraphs.*.text.max'      => 'Paragraph is too long.',
        ],
    ],

    'comparison' => [
        'label' => 'Comparison Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,

        'rules' => [
            'heading' => 'required|string|max:255',
            'highlight' => 'required|string|max:255',

            // 👇 NEW
            'us_label' => 'required|string|max:100',
            'agency_label' => 'required|string|max:100',
            'diy_label' => 'required|string|max:100',

            'items' => 'required|array|min:1|max:10',

            'items.*.feature' => 'required|string|max:255',
            'items.*.us_text' => 'required|string|max:500',
            'items.*.agency_text' => 'required|string|max:500',
            'items.*.diy_text' => 'required|string|max:500',
        ],

        'messages' => [
            'us_label.required' => 'Your column label is required.',
            'agency_label.required' => 'Agency column label is required.',
            'diy_label.required' => 'DIY column label is required.',

            'items.*.feature.required' => 'Row :position — feature is required.',
            'items.*.us_text.required' => 'Row :position — your value is required.',
            'items.*.agency_text.required' => 'Row :position — agency value is required.',
            'items.*.diy_text.required' => 'Row :position — DIY value is required.',
        ],
    ],

    'testimonials' => [
        'label' => 'Testimonials Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,

        'rules' => [
            'heading' => 'required|string|max:255',
            'highlight' => 'required|string|max:255',

            'items' => 'required|array|min:1|max:10',

            'items.*.rating' => 'required|integer|min:1|max:5',
            'items.*.text' => 'required|string|max:1000',
            'items.*.name' => 'required|string|max:100',
            'items.*.role' => 'required|string|max:150',
            'items.*.company' => 'nullable|string|max:150',
            'items.*.image' => 'nullable|string|max:255',
        ],

        'messages' => [
            'heading.required' => 'Heading is required.',
            'highlight.required' => 'Highlight text is required.',

            'items.required' => 'Add at least one testimonial.',
            'items.min' => 'Add at least one testimonial.',
            'items.max' => 'You can add up to 10 testimonials only.',

            'items.*.rating.required' => 'Rating is required.',
            'items.*.rating.max' => 'Rating cannot exceed 5 stars.',

            'items.*.text.required' => 'Testimonial text is required.',
            'items.*.name.required' => 'Client name is required.',
            'items.*.role.required' => 'Client role is required.',
        ],
    ],
    'whyblueorbit' => [
        'label' => 'Trust Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,

        'rules' => [
            'heading' => 'required|string|max:255',
            'highlight' => 'required|string|max:255',

            // FEATURES
            'features' => 'required|array|min:1|max:6',
            'features.*.icon' => 'required|string|max:100',
            'features.*.title' => 'required|string|max:255',
            'features.*.desc' => 'required|string|max:1000',

            // PARTNERS
            'partners' => 'nullable|array|max:10',
            'partners.*.icon' => 'required|string|max:100',

            // TAGS
            'tags' => 'nullable|array|max:10',
            'tags.*' => 'required|string|max:255',
        ],

        'messages' => [
            'heading.required' => 'Heading is required.',
            'highlight.required' => 'Highlight is required.',

            'features.required' => 'Add at least one feature.',
            'features.min' => 'Add at least one feature.',
            'features.max' => 'Max 6 features allowed.',

            'features.*.icon.required' => 'Feature icon is required.',
            'features.*.title.required' => 'Feature title is required.',
            'features.*.desc.required' => 'Feature description is required.',

            'partners.max' => 'Max 10 partners allowed.',
            'tags.max' => 'Max 10 tags allowed.',
        ],
    ],

    'usecases' => [
        'label' => 'Usecases Section',
        'allowed_for' => ['parent', 'sub'],
        'system' => false,
        'rules' => [
            'heading'              => 'required|string|max:500',
            'heading_highlight'    => 'required|string|max:200',
            'subheading'           => 'nullable|string|max:500',

            'items'                => 'required|array|min:1|max:9',
            'items.*.title'        => 'required|string|max:100',
            'items.*.link'         => 'nullable|string|max:255',
            'items.*.points'       => 'required|array|min:1|max:6',
            'items.*.points.*'     => 'required|string|max:255',

            'cta_heading'          => 'nullable|string|max:200',
            'cta_subheading'       => 'nullable|string|max:300',
            'cta_button_text'      => 'nullable|string|max:100',
            'cta_button_link'      => 'nullable|string|max:255',
        ],
        'messages' => [
            'heading.required'           => 'Main heading is required.',
            'heading_highlight.required' => 'Highlighted heading text is required.',
            'items.required'             => 'Add at least one industry.',
            'items.min'                  => 'Add at least one industry.',
            'items.max'                  => 'You can add up to 9 industries.',
            'items.*.title.required'     => 'Item :position — title is required.',
            'items.*.points.required'    => 'Item :position — add at least one bullet point.',
            'items.*.points.min'         => 'Item :position — add at least one bullet point.',
            'items.*.points.max'         => 'Item :position — max 6 bullet points.',
            'items.*.points.*.required'  => 'Item :position — bullet point cannot be empty.',
        ],
    ],

];
