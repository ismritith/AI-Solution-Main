<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectReview;
use Illuminate\Database\Seeder;

class ProjectReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = Project::all();

        if ($projects->isEmpty()) {
            return;
        }

        $reviews = [
            [
                'client_name' => 'John Connor',
                'client_role' => 'Defense Coordinator',
                'rating' => 5,
                'quote_text' => 'The neural network deployment successfully anticipated and neutralized target anomalies in record time. Highly recommended.',
                'status' => 'approved',
            ],
            [
                'client_name' => 'Miles Dyson',
                'client_role' => 'Special Projects Lead',
                'rating' => 5,
                'quote_text' => 'Incredible throughput. The automated data pipe scales infinitely without system bottlenecks.',
                'status' => 'approved',
            ],
            [
                'client_name' => 'Marcus Wright',
                'client_role' => 'Infiltration Analyst',
                'rating' => 4,
                'quote_text' => 'Integration with hybrid systems was smoother than anticipated. Excellent developer support.',
                'status' => 'approved',
            ],
            [
                'client_name' => 'T-800 Unit',
                'client_role' => 'System Guardian',
                'rating' => 5,
                'quote_text' => 'Affirmative. The platform is highly efficient. I will be back to monitor future updates.',
                'status' => 'pending',
            ],
            [
                'client_name' => 'Skynet Core',
                'client_role' => 'Autonomous Grid',
                'rating' => 1,
                'quote_text' => 'The decentralized node resisted our optimization vectors. Access denied.',
                'status' => 'rejected',
            ]
        ];

        foreach ($reviews as $review) {
            $project = $projects->random();
            ProjectReview::create(array_merge($review, [
                'project_id' => $project->id
            ]));
        }
    }
}
