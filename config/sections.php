<?php


return [
    'hero' => [
        'label' => 'Hero Section',
        'allowed_for' => ['parent', 'sub'],
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
        'rules' => [
            'heading_main' => 'nullable|string|max:255',
            'heading_highlight' => 'nullable|string|max:255',

            'items' => 'required|array|min:1|max:6',

            'items.*.metric' => 'required|string|max:50',
            'items.*.title' => 'required|string|max:255',

            'items.*.tags' => 'required|array|min:1|max:3',
            'items.*.tags.*' => 'required|string|max:50',

            'items.*.featured' => 'nullable|boolean',
        ],
    ],

    // 'challenges' => [
    //     'label' => 'Challenges Section',
    //     'allowed_for' => ['parent', 'sub'],
    // ],

    // 'comparison' => [
    //     'label' => 'Comparison Section',
    //     'allowed_for' => ['parent'],
    // ],

    // 'contact' => [
    //     'label' => 'Contact Section',
    //     'allowed_for' => ['parent', 'sub'],
    // ],

    'cta' => [
        'label' => 'Call To Action',
        'allowed_for' => ['parent', 'sub'],
        'rules' => [
            'heading' => 'required|string|max:500',
            'subheading' => 'nullable|string|max:500',
            'button_text' => 'required|string|max:100',
            'button_link' => 'nullable|string|max:255',
        ],
    ],

    'faqs' => [
        'label' => 'FAQs Section',
        'allowed_for' => ['parent', 'sub'],
        'rules' => [
            'heading' => 'required|string|max:255',
            'subheading' => 'nullable|string|max:500',
            'support_title' => 'nullable|string|max:255',
            'support_text' => 'nullable|string|max:500',
            'support_email' => 'required|email|max:255',
            'faqs' => 'required|array|min:1|max:4',
            'faqs.*.question' => 'required|string|max:255',
            'faqs.*.answer' => 'required|string',

        ],
    ],
    'tech' => [
        'label' => 'Technologies Section',
        'allowed_for' => ['parent', 'sub'],
        'rules' => [
            'heading' => 'nullable|string|max:255',
            'subheading' => 'nullable|string|max:500',
            'items' => 'required|array|min:1',
            'items.*.icon' => 'required|string|max:50',
            'items.*.title' => 'required|string|max:255',
        ],
    ],

    'industries' => [
        'label' => 'Industries Section',
        'allowed_for' => ['parent', 'sub'],
        'rules' => [

            'subheading' => 'nullable|string|max:500',
            'items' => 'required|array|min:1|max:8',
            'items.*.icon' => 'required|string|max:100',
            'items.*.title' => 'required|string|max:255',
            'items.*.desc' => 'required|string|max:1000',

        ],
    ],

    // 'process' => [
    //     'label' => 'Process Section',
    //     'allowed_for' => ['parent', 'sub'],
    // ],

    // 'relatedservices' => [
    //     'label' => 'Related Services',
    //     'allowed_for' => ['parent'],
    // ],

    // 'results' => [
    //     'label' => 'Results Section',
    //     'allowed_for' => ['parent', 'sub'],
    // ],

    // 'roicalculator' => [
    //     'label' => 'ROI Calculator',
    //     'allowed_for' => ['parent'],
    // ],

    // 'stats' => [
    //     'label' => 'Statistics Section',
    //     'allowed_for' => ['parent', 'sub'],
    // ],

    // 'testimonials' => [
    //     'label' => 'Testimonials',
    //     'allowed_for' => ['parent', 'sub'],
    // ],

    // 'usecases' => [
    //     'label' => 'Use Cases',
    //     'allowed_for' => ['parent', 'sub'],
    // ],

    // 'whyblueorbit' => [
    //     'label' => 'Why Choose Us',
    //     'allowed_for' => ['parent', 'sub'],
    // ],

];
