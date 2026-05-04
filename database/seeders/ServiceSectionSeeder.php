<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServiceSection;

class ServiceSectionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $sectionTypes = [
            'benefits',
            'challenges',
            'custom',
            'faqs',
            'hero',
            'industries',
            'process',
            'relatedservices',
            'services',
            'stats',
            'tech',
            'testimonials',
            'usecases',
            'whyblueorbit',
            'casestudy',
            'comparison',
            'cta',
            'servicedetails'
        ];

        $services = Service::all();

        foreach ($services as $service) {

            $selectedSections = collect($sectionTypes)
                ->shuffle()
                // ->take(rand(8, 12))
                ->values();

            foreach ($selectedSections as $index => $type) {

                $data = [];

                switch ($type) {

                    case 'hero':
                        $data = [
                            'heading' => "Grow Your {$service->title}",
                            'subheading' => "Scalable digital solutions designed to boost your business growth.",
                            'review_text' => "Trusted by global clients for reliable performance.",
                            'reviewer_name' => "Verified Client",
                            // Optional fields - keeping them null for now
                            'input_placeholder' => null,
                            'button_text' => "Get Started",
                            'button_link' => "#contact",
                            'image' => null,
                        ];
                        break;

                    case 'benefits':
                        $data = [
                            'subheading' => "Key Benefits",
                            'items' => []
                        ];

                        for ($i = 0; $i < rand(5, 8); $i++) {
                            $data['items'][] = [
                                'icon' => $faker->randomElement(['target', 'globe', 'award', 'settings']),
                                'title' => $faker->sentence(3),
                                'desc' => $faker->sentence(12),
                            ];
                        }
                        break;

                    case 'casestudy':
                        $data = [
                            'heading_main' => "Case Studies",
                            'heading_highlight' => "Real Results",
                            'items' => []
                        ];

                        for ($i = 0; $i < 3; $i++) {
                            $data['items'][] = [
                                'metric' => rand(20, 300) . '%',
                                'title' => $faker->sentence(3),
                                'tags' => $faker->words(rand(1, 3)),
                                'featured' => $i === 0, // First one featured
                            ];
                        }
                        break;

                    case 'cta':
                        $data = [
                            'heading' => "Ready to Start?",
                            'subheading' => "Let’s build something powerful together.",
                            'button_text' => "Get Started",
                            'button_link' => "#contact",
                        ];
                        break;

                    case 'faqs':
                        $data = [
                            'heading' => "Frequently Asked Questions",
                            'subheading' => "Find answers to common questions about {$service->title}",
                            'support_title' => "Still have questions?",
                            'support_text' => "Our team is here to help you.",
                            'support_email' => "hello@blueorbit.com",
                            'faqs' => [
                                [
                                    'question' => "What is included in {$service->title}?",
                                    'answer' => "We provide complete end-to-end solutions tailored to your business."
                                ],
                                [
                                    'question' => "How long does it take?",
                                    'answer' => "Delivery time depends on project complexity."
                                ],
                                [
                                    'question' => "Do you offer support?",
                                    'answer' => "Yes, full post-launch support is included."
                                ],
                            ]
                        ];
                        break;

                    case 'tech':
                        $data = [
                            'heading' => "Technology Stack",
                            'subheading' => "Modern tools and frameworks we use",
                            'items' => []
                        ];

                        for ($i = 0; $i < rand(15, 25); $i++) {
                            $data['items'][] = [
                                'icon' => $faker->randomElement(['globe', 'settings']),
                                'title' => $faker->word(),
                            ];
                        }
                        break;

                    case 'industries':
                        $data = [
                            'subheading' => "Industries We Serve",
                            'items' => []
                        ];

                        for ($i = 0; $i < rand(5, 8); $i++) {
                            $data['items'][] = [
                                'icon' => $faker->randomElement(['globe', 'award', 'settings']),
                                'title' => $faker->sentence(3),
                                'desc' => $faker->sentence(12),
                            ];
                        }
                        break;

                    // Sections without updated rules - keeping original structure
                    case 'challenges':
                    case 'custom':
                    case 'process':
                    case 'relatedservices':
                    case 'services':
                    case 'stats':
                    case 'testimonials':
                    case 'usecases':
                    case 'whyblueorbit':
                    case 'comparison':
                    case 'servicedetails':
                    default:
                        // Use the original logic for these sections
                        $this->generateSectionData($type, $service, $faker, $data);
                        break;
                }

                ServiceSection::create([
                    'type' => $type,
                    'service_id' => $service->id,
                    // 'order' => ($index + 1) * 10,
                    'order' => ($index + 1),
                    'data' => $data,
                ]);
            }
        }
    }

    /**
     * Original data generation for sections without new rules
     */
    private function generateSectionData(string $type, $service, $faker, &$data): void
    {
        switch ($type) {

            case 'challenges':
                $data = [
                    'subheading' => "Challenges We Solve",
                    'items' => []
                ];

                for ($i = 0; $i < rand(3, 5); $i++) {
                    $data['items'][] = [
                        'issue' => $faker->sentence(8),
                        'fix' => $faker->sentence(10),
                        'result' => $faker->sentence(8),
                    ];
                }
                break;

            case 'process':
                $process = [];
                for ($i = 0; $i < rand(3, 5); $i++) {
                    $process[] = [
                        'icon' => $faker->randomElement(['target', 'line-chart', 'globe', 'award', 'user-check', 'settings']),
                        'title' => $faker->words(rand(1, 3), true),
                        'desc' => $faker->sentence(rand(15, 20)),
                    ];
                }
                $data['subheading'] = $faker->sentence(rand(20, 30));
                $data['items'] = $process;
                break;

            case 'stats':
                $data = [
                    'heading' => "Performance Stats",
                    'items' => [
                        ['title' => rand(100, 500), 'desc' => 'Projects Completed'],
                        ['title' => rand(80, 99) . '%', 'desc' => 'Client Satisfaction'],
                        ['title' => rand(5, 15) . '+', 'desc' => 'Years Experience'],
                        ['title' => rand(200, 1000) . '+', 'desc' => 'Happy Clients'],
                    ]
                ];
                break;

            case 'relatedservices':
                $data = null;
                break;

            case 'services':
                $data = [
                    'subheading' => "Our Services",
                    'items' => []
                ];

                for ($i = 0; $i < rand(5, 8); $i++) {
                    $data['items'][] = [
                        'icon' => $faker->randomElement(['target', 'globe', 'award', 'settings']),
                        'title' => $faker->sentence(3),
                        'desc' => $faker->sentence(12),
                    ];
                }
                break;

            case 'testimonials':
                $data['heading'] = $faker->sentence(rand(3, 5));
                $testimonials = [];
                for ($i = 0; $i < 3; $i++) {
                    $gender = fake()->randomElement(['male', 'female']);
                    $testimonials[] = [
                        'stars' => rand(3, 5),
                        'testimonial' => $faker->sentence(rand(25, 30)),
                        'customer' => $faker->name($gender),
                        'designation' => $faker->jobTitle(),
                        'firm' => $faker->company(),
                        'location' => $faker->city(),
                        'avatar' => match ($gender) {
                            'male' => "https://api.dicebear.com/7.x/avataaars/svg?seed=" . fake()->firstNameMale(),
                            'female' => "https://api.dicebear.com/7.x/avataaars/svg?seed=" . fake()->firstNameFemale(),
                        }
                    ];
                }
                $data['items'] = $testimonials;
                break;

            case 'usecases':
                $data = [
                    'heading' => "Use Cases",
                    'subheading' => "Real-world applications",
                    'items' => []
                ];

                for ($i = 0; $i < 3; $i++) {
                    $data['items'][] = [
                        'title' => $faker->word(),
                        'usecases' => $faker->sentences(3),
                    ];
                }
                break;

            case 'whyblueorbit':
                $data = [
                    'heading' => "Why Choose Us",
                    'items' => []
                ];

                for ($i = 0; $i < rand(5, 8); $i++) {
                    $data['items'][] = [
                        'icon' => $faker->randomElement(['target', 'line-chart', 'globe', 'award', 'user-check', 'settings']),
                        'title' => $faker->sentence(3),
                        'desc' => $faker->sentence(12),
                    ];
                }
                break;

            case 'custom':
                $data['heading'] = $faker->sentence(rand(3, 8));
                $data['subheading'] = $faker->sentence(rand(20, 80));
                break;

            case 'comparison':
                $data = [
                    'heading' => "Comparison",
                    'items' => []
                ];

                for ($i = 0; $i < rand(4, 6); $i++) {
                    $data['items'][] = [
                        'feature' => $faker->word(),
                        'blueorbit' => $faker->sentence(5),
                        'others' => $faker->sentence(5),
                        'diy' => $faker->sentence(5),
                    ];
                }
                break;

            case 'servicedetails':
                $data = [
                    'heading' => "Service Details",
                    'items' => []
                ];

                for ($i = 0; $i < rand(3, 5); $i++) {
                    $sub = [];
                    for ($j = 0; $j < 3; $j++) {
                        $sub[] = [
                            'question' => $faker->sentence(5),
                            'answer' => $faker->sentence(15),
                        ];
                    }

                    $data['items'][] = [
                        'title' => $faker->sentence(3),
                        'desc' => $faker->sentence(15),
                        'details' => $sub,
                    ];
                }
                break;

            default:
                $data = [
                    'text' => "{$type} content for {$service->title}"
                ];
                break;
        }
    }
}
