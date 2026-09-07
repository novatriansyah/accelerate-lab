<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = array (
  0 => 
  array (
    'id' => 1,
    'title' => 'Livestock Management System',
    'slug' => 'livestock-management-system',
    'client' => 'PT Sahabat Farm Indonesia',
    'industry' => 'Agriculture',
    'description' => 'Sahabat Farm Indonesia is an integrated agricultural initiative designed to modernize traditional farming practices in Indonesia. It serves as a digital bridge between rural farmers and sustainable market ecosystems. The platform leverages web technology to streamline supply chain transparency, improve resource management, and provide farmers with data-driven insights to optimize crop yields and financial stability.',
    'challenge' => '<p>The Indonesian agricultural sector suffers from significant fragmentation and technical debt. Primary challenges include:</p><ul><li><strong>Information Asymmetry:</strong> Farmers lack real-time access to market prices, leading to exploitation by middlemen.</li><li><strong>Operational Inefficiency:</strong> Reliance on manual record-keeping prevents scalable growth and limits access to formal financing.</li><li><strong>Supply Chain Opacity:</strong> Lack of traceability reduces the market value of produce and complicates logistics for SME buyers.</li><li><strong>Resource Management:</strong> Inefficient use of inputs (water, fertilizer) due to a lack of soil-specific or climate-related data.</li></ul>',
    'solution' => '<p>Accelerate Lab deployed a custom-built digital infrastructure to centralize farm operations:</p><ul><li><strong>Unified Dashboard:</strong> A centralized interface for tracking planting cycles, inventory, and labor distribution.</li><li><strong>Market Transparency Module:</strong> Real-time price indexing to ensure fair trade and direct-to-market capabilities.</li><li><strong>Data Analytics:</strong> Implementation of basic predictive modeling to forecast harvest timelines and expected yields.</li><li><strong>Traceability System:</strong> A digital ledger that records the journey of produce from seedling to end-consumer, increasing trust for enterprise clients</li></ul>',
    'technology_tags' => 
    array (
      0 => 'Laravel',
      1 => 'Tailwind CSS',
    ),
    'image_path' => 'projects/01KYQF7GZVZ9SXX20A7DT6B6FB.png',
    'gallery' => 
    array (
      0 => 'projects/gallery/01KYQF7GZWZDFAMMCV6736A4NC.png',
    ),
    'testimonials' => 
    array (
    ),
    'stats' => 
    array (
      0 => 
      array (
        'label' => 'Operational Efficiency Increase',
        'value' => '35%',
      ),
      1 => 
      array (
        'label' => 'Supply Chain Waste Reduction',
        'value' => '20%',
      ),
      2 => 
      array (
        'label' => 'Partner Farmer Onboarding Growth',
        'value' => '50%',
      ),
    ),
    'color' => '#38ff70',
    'icon' => 'agriculture',
    'is_featured' => true,
  ),
  1 => 
  array (
    'id' => 2,
    'title' => 'Telaah',
    'slug' => 'telaah',
    'client' => 'Internal Product',
    'industry' => 'Legal Tech & Artificial Intelligence',
    'description' => 'An automated AI-powered contract auditing and legal compliance platform tailored to Indonesian regulatory frameworks (such as UU PDP No. 27/2022 and KUHPer).',
    'challenge' => '<p>Auditing legal agreements manually is slow, expensive, and prone to oversight. Building a self-service automated alternative tailored to Indonesian law required overcoming major technical hurdles: ensuring strict compliance with UU PDP data privacy rights (scrubbing and encrypting PII before sending it to external AI APIs), processing scanned contracts and DOCX files up to 100MB without memory exhaustion, and protecting the ledger billing system from race conditions during concurrent audit runs.<br><br></p>',
    'solution' => '<p>We engineered a highly optimized monolith with an asynchronous, dual-stage AI processing pipeline. Stage 1 (Scout) runs on Supabase Edge functions, performing in-memory PII masking and AES-256-GCM encryption. Stage 2 executes deep legal audits using latest compliance engine. To handle files up to 100MB, we developed a chunking system logic, while race conditions on credits were eliminated using atomic transactions with row-level locks.<br><br></p>',
    'technology_tags' => 
    array (
      0 => 'Docker',
      1 => 'Echo',
      2 => 'iPaymu',
      3 => 'Kong Gateway',
      4 => 'OpenRouter',
      5 => 'Next.js',
      6 => 'SumoPod',
      7 => 'Supabase',
      8 => 'Tailwind CSS',
      9 => 'React',
      10 => 'Vector',
    ),
    'image_path' => 'projects/01KYQF5ENWZ1J9PPD3AV4V9B37.png',
    'gallery' => 
    array (
      0 => 'projects/gallery/01KYQF5ENXYX58QERE3113DEH8.png',
      1 => 'projects/gallery/01KYQF5ENY2DDQ8F4WW7TZH4RK.png',
    ),
    'testimonials' => 
    array (
    ),
    'stats' => 
    array (
      0 => 
      array (
        'label' => 'Audit Latency	',
        'value' => '<30 Second',
      ),
      1 => 
      array (
        'label' => 'Max File Capacity',
        'value' => '100 MB',
      ),
      2 => 
      array (
        'label' => 'Encryption Standard',
        'value' => 'AES-256-GCM',
      ),
      3 => 
      array (
        'label' => 'Compliance Rating',
        'value' => '100% UU PDP',
      ),
    ),
    'color' => '#4f46e5',
    'icon' => 'gavel',
    'is_featured' => true,
  ),
);
        $projectTechnologies = array (
  0 => 
  array (
    'id' => 1,
    'project_id' => 1,
    'technology_id' => 1,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  1 => 
  array (
    'id' => 2,
    'project_id' => 1,
    'technology_id' => 3,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  2 => 
  array (
    'id' => 3,
    'project_id' => 2,
    'technology_id' => 4,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  3 => 
  array (
    'id' => 4,
    'project_id' => 2,
    'technology_id' => 6,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  4 => 
  array (
    'id' => 5,
    'project_id' => 2,
    'technology_id' => 13,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  5 => 
  array (
    'id' => 6,
    'project_id' => 2,
    'technology_id' => 12,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  6 => 
  array (
    'id' => 7,
    'project_id' => 2,
    'technology_id' => 9,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  7 => 
  array (
    'id' => 8,
    'project_id' => 2,
    'technology_id' => 7,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  8 => 
  array (
    'id' => 9,
    'project_id' => 2,
    'technology_id' => 11,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  9 => 
  array (
    'id' => 10,
    'project_id' => 2,
    'technology_id' => 8,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  10 => 
  array (
    'id' => 11,
    'project_id' => 2,
    'technology_id' => 3,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  11 => 
  array (
    'id' => 12,
    'project_id' => 2,
    'technology_id' => 2,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
  12 => 
  array (
    'id' => 13,
    'project_id' => 2,
    'technology_id' => 10,
    'created_at' => NULL,
    'updated_at' => NULL,
  ),
);

        foreach ($projects as $p) {
            $project = Project::updateOrCreate(
                ['slug' => $p['slug']],
                $p
            );
        }

        // Sync technology relationships
        foreach ($projectTechnologies as $pt) {
            $project = Project::find($pt['project_id']);
            if ($project && !$project->technologies()->where('technologies.id', $pt['technology_id'])->exists()) {
                $project->technologies()->attach($pt['technology_id']);
            }
        }
    }
}
