<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = array (
  0 => 
  array (
    'id' => 1,
    'title' => 'Web Application Development',
    'meta_title' => NULL,
    'slug' => 'web-application-development',
    'has_custom_page' => true,
    'icon' => 'code',
    'hero_image' => 'services/01M0NTJCXMDVNTC88V9HG3JGXQ.png',
    'short_description' => 'We build high-performance, custom web applications designed to solve complex business challenges. From enterprise resource planning (ERP) to specialized internal tools, our focus is on reliability, security, and seamless user experience.',
    'content' => '<p>At <strong>Accelerate Lab</strong>, we don\'t just write code; we engineer digital ecosystems. We understand that for Indonesian SMEs and enterprises, a web application is more than just a site, it\'s the backbone of your operations. Our development philosophy centers on a <strong>monolithic-first approach</strong> using Laravel to ensure rapid deployment without sacrificing the ability to scale.</p><p>Whether you need a custom CRM to manage client relationships, a robust inventory system, or an automated reporting dashboard, we deliver clean, maintainable code that grows with your business. We prioritize performance and security, ensuring your data is protected while providing a lightning-fast interface for your users.</p>',
    'sort_order' => 1,
    'features' => 
    array (
      0 => 
      array (
        'title' => 'Senior Expertise',
        'icon' => 'verified_user',
        'description' => 'Lead by engineers with 6+ years of experience in enterprise environments.',
      ),
      1 => 
      array (
        'title' => 'Business-Centric',
        'icon' => 'insights',
        'description' => 'We focus on ROI and operational efficiency, not just "cool tech."',
      ),
      2 => 
      array (
        'title' => 'Direct Partnership',
        'icon' => 'handshake',
        'description' => 'You work directly with technical decision-makers, ensuring no loss in communication.',
      ),
      3 => 
      array (
        'title' => 'Local Context',
        'icon' => 'location_on',
        'description' => 'Deep understanding of the Indonesian business landscape and local enterprise requirements.',
      ),
    ),
    'technologies' => 
    array (
      0 => 
      array (
        'name' => 'Laravel',
        'icon' => 'code',
      ),
      1 => 
      array (
        'name' => 'Node.js',
        'icon' => 'code',
      ),
      2 => 
      array (
        'name' => 'TailwindCSS',
        'icon' => 'web',
      ),
      3 => 
      array (
        'name' => 'Alpine.js',
        'icon' => 'web',
      ),
      4 => 
      array (
        'name' => 'Livewire',
        'icon' => 'web',
      ),
      5 => 
      array (
        'name' => 'React',
        'icon' => 'web',
      ),
      6 => 
      array (
        'name' => 'PostgreSQL',
        'icon' => 'storage',
      ),
      7 => 
      array (
        'name' => 'MySQL',
        'icon' => 'storage',
      ),
      8 => 
      array (
        'name' => 'Redis',
        'icon' => 'storage',
      ),
      9 => 
      array (
        'name' => 'Docker',
        'icon' => 'cloud_queue',
      ),
      10 => 
      array (
        'name' => 'Nginx',
        'icon' => 'cloud_queue',
      ),
      11 => 
      array (
        'name' => 'DigitalOcean',
        'icon' => 'cloud_queue',
      ),
      12 => 
      array (
        'name' => 'AWS',
        'icon' => 'cloud_queue',
      ),
    ),
    'process' => 
    array (
      0 => 
      array (
        'title' => 'Discovery & Architecture',
        'description' => 'We analyze your business processes to design the optimal system architecture and database schema.',
      ),
      1 => 
      array (
        'title' => 'Agile Development',
        'description' => 'Iterative coding phases with frequent updates, allowing for feedback and adjustments in real-time.',
      ),
      2 => 
      array (
        'title' => 'Precise Testing',
        'description' => 'Comprehensive QA focusing on security vulnerabilities and edge-case performance.',
      ),
      3 => 
      array (
        'title' => 'Deployment & Optimization',
        'description' => 'Launching on high-performance VPS/Cloud environments with automated CI/CD pipelines.',
      ),
      4 => 
      array (
        'title' => 'Ongoing Maintenance',
        'description' => 'Proactive monitoring and updates to ensure the system remains secure and modern.',
      ),
    ),
    'cta_text' => 'Consult Your Project Now',
    'category' => 'development',
    'headline' => 'Scalable Web Solutions Engineered for Business Growth',
    'benefits' => 
    array (
      0 => 'Custom-Fit Logic: Systems built specifically for your unique business workflows.',
      1 => 'High Performance: Optimized for speed and low-latency interactions.',
      2 => 'Responsive Design: Flawless operation across desktops, tablets, and mobile devices.',
      3 => 'Secure Architecture: Implementation of industry-standard security protocols to protect sensitive data.',
      4 => 'Easy Maintenance: Clean, documented codebases that are easy to update and expand.',
    ),
  ),
  1 => 
  array (
    'id' => 2,
    'title' => 'Mobile App Development',
    'meta_title' => NULL,
    'slug' => 'mobile-app-development',
    'has_custom_page' => true,
    'icon' => 'smartphone',
    'hero_image' => 'services/01M0NTKA3XF4DDG2HXGC3JRR5R.png',
    'short_description' => 'We create seamless, cross-platform mobile experiences that bring your business directly to your customers\' pockets. From intuitive UI/UX to robust backend integration, we deliver apps that perform.',
    'content' => '<p>At <strong>Accelerate Lab</strong>, we specialize in building mobile applications that offer native-like performance with the efficiency of a single codebase. Leveraging modern cross-platform frameworks, we ensure your app reaches both <strong>iOS</strong> and <strong>Android</strong> users simultaneously, reducing time-to-market and maintenance costs.</p><p>Whether you are looking to build a customer-facing loyalty app, a field service tool for your team, or a complex marketplace, we prioritize smooth animations, offline capabilities, and secure data handling. Our mobile solutions are designed to be an extension of your digital ecosystem, fully integrated with your existing web platforms and APIs.</p>',
    'sort_order' => 2,
    'features' => 
    array (
      0 => 
      array (
        'title' => 'Native Performance',
        'icon' => 'speed',
        'description' => 'Optimized code to ensure smooth 60 FPS performance on all devices.',
      ),
      1 => 
      array (
        'title' => 'UI/UX Excellence',
        'icon' => 'touch_app',
        'description' => 'Dedicated focus on mobile-first design principles and accessibility.',
      ),
      2 => 
      array (
        'title' => 'Secure by Design',
        'icon' => 'security',
        'description' => 'Implementation of encrypted storage and secure authentication flows.',
      ),
      3 => 
      array (
        'title' => 'End-to-End Delivery',
        'icon' => 'publish',
        'description' => 'We handle everything from design to App Store and Play Store submission.',
      ),
    ),
    'technologies' => 
    array (
      0 => 
      array (
        'name' => 'Flutter',
        'icon' => 'smartphone',
      ),
      1 => 
      array (
        'name' => 'React Native',
        'icon' => 'smartphone',
      ),
      2 => 
      array (
        'name' => 'REST API',
        'icon' => 'hub',
      ),
      3 => 
      array (
        'name' => 'GraphQL',
        'icon' => 'hub',
      ),
      4 => 
      array (
        'name' => 'Laravel',
        'icon' => 'hub',
      ),
      5 => 
      array (
        'name' => 'Firebase',
        'icon' => 'cloud_done',
      ),
      6 => 
      array (
        'name' => 'AWS Amplify',
        'icon' => 'cloud_done',
      ),
      7 => 
      array (
        'name' => 'Provider',
        'icon' => 'account_tree',
      ),
      8 => 
      array (
        'name' => 'Bloc',
        'icon' => 'account_tree',
      ),
      9 => 
      array (
        'name' => 'Redux',
        'icon' => 'account_tree',
      ),
    ),
    'process' => 
    array (
      0 => 
      array (
        'title' => 'UI/UX Prototyping',
        'description' => 'We create interactive wireframes and high-fidelity designs to visualize the user journey.',
      ),
      1 => 
      array (
        'title' => 'Environment Setup',
        'description' => 'Configuring cross-platform environments and integrating core backend services.',
      ),
      2 => 
      array (
        'title' => 'Feature Development',
        'description' => 'Building the app in sprints, ensuring core functionalities are prioritized and tested.',
      ),
      3 => 
      array (
        'title' => 'Device Testing',
        'description' => 'Rigorous testing on various screen sizes, OS versions, and hardware specifications.',
      ),
      4 => 
      array (
        'title' => 'Store Deployment',
        'description' => 'Managing the submission process and optimization for Apple App Store and Google Play Store.',
      ),
    ),
    'cta_text' => 'Start Your Mobile Project',
    'category' => 'development',
    'headline' => 'High-Performance Mobile Applications for Modern Businesses',
    'benefits' => 
    array (
      0 => 'Cross-Platform Efficiency: Single codebase for both iOS and Android platforms.',
      1 => 'Fluid User Experience: Intuitive interfaces designed for high engagement and ease of use.',
      2 => 'Offline Support: Capabilities to ensure functionality even with limited internet connectivity.',
      3 => 'Push Notification Integration: Keep your users engaged with real-time updates and alerts.',
      4 => 'Biometric Security: Integration with FaceID, TouchID, and fingerprint sensors for secure access.',
    ),
  ),
  2 => 
  array (
    'id' => 3,
    'title' => 'UI/UX Design',
    'meta_title' => NULL,
    'slug' => 'ui-ux-design',
    'has_custom_page' => true,
    'icon' => 'brush',
    'hero_image' => 'services/01M0NTMGKQGYJQH3TN83GF39KH.png',
    'short_description' => 'We blend aesthetics with functionality to create user-centric designs. Our goal is to transform complex business requirements into simple, beautiful, and highly usable digital experiences.',
    'content' => '<p>At <strong>Accelerate Lab</strong>, we believe that great design is invisible. It should guide the user effortlessly toward their goal without friction. Our UI/UX design process is rooted in psychology and data, ensuring that every button, layout, and interaction serves a specific purpose for your business.</p><p>We don\'t just focus on "making things look good." We conduct deep research into your user personas and business goals to create <strong>high-fidelity prototypes</strong> that look and feel like the final product. Whether it\'s a dashboard for internal enterprise use or a consumer-facing landing page, we prioritize accessibility, brand consistency, and conversion optimization.</p>',
    'sort_order' => 3,
    'features' => 
    array (
      0 => 
      array (
        'title' => 'Detail Oriented',
        'icon' => 'center_focus_strong',
        'description' => 'Every pixel is placed with intention and precision.',
      ),
      1 => 
      array (
        'title' => 'Iterative Process',
        'icon' => 'loop',
        'description' => 'Continuous feedback loops to ensure the design aligns with your vision.',
      ),
      2 => 
      array (
        'title' => 'Engineering Mindset',
        'icon' => 'architecture',
        'description' => 'We design with technical feasibility in mind to ensure smooth development.',
      ),
      3 => 
      array (
        'title' => 'Brand Integration',
        'icon' => 'auto_awesome',
        'description' => 'We ensure your digital product reflects your brand identity perfectly.',
      ),
    ),
    'technologies' => 
    array (
      0 => 
      array (
        'name' => 'Figma',
        'icon' => 'brush',
      ),
      1 => 
      array (
        'name' => 'Adobe XD',
        'icon' => 'brush',
      ),
      2 => 
      array (
        'name' => 'Framer',
        'icon' => 'Ads_click',
      ),
      3 => 
      array (
        'name' => 'ProtoPie',
        'icon' => 'Ads_click',
      ),
      4 => 
      array (
        'name' => 'Storybook',
        'icon' => 'auto_stories',
      ),
      5 => 
      array (
        'name' => 'Zeroheight',
        'icon' => 'auto_stories',
      ),
      6 => 
      array (
        'name' => 'FigJam',
        'icon' => 'groups',
      ),
      7 => 
      array (
        'name' => 'Miro',
        'icon' => 'groups',
      ),
    ),
    'process' => 
    array (
      0 => 
      array (
        'title' => 'User Research',
        'description' => 'Interviews and competitive analysis to understand the landscape.',
      ),
      1 => 
      array (
        'title' => 'Wireframing',
        'description' => 'Low-fidelity sketches to establish the skeletal structure and user flow.',
      ),
      2 => 
      array (
        'title' => 'Visual Design',
        'description' => 'Applying colors, typography, and imagery to create high-fidelity UI.',
      ),
      3 => 
      array (
        'title' => 'Interactive Prototyping',
        'description' => 'Building clickable versions to simulate the real app experience.',
      ),
      4 => 
      array (
        'title' => 'Developer Handoff',
        'description' => 'Providing clean assets, CSS variables, and documentation for our engineering team.',
      ),
    ),
    'cta_text' => 'Get a Design Audit',
    'category' => 'development',
    'headline' => 'Crafting Intuitive Interfaces that Drive User Engagement',
    'benefits' => 
    array (
      0 => 'User-Centric Approach: Designs based on actual user behavior and pain points.',
      1 => 'Rapid Prototyping: Interactive mockups to test flows before writing a single line of code.',
      2 => 'Design Systems: Scalable component libraries to ensure long-term visual consistency.',
      3 => 'Accessibility: Inclusive design ensuring usability for people with varying abilities.',
      4 => 'Conversion Optimization: Strategic layouts designed to guide users toward your primary CTA.',
    ),
  ),
  3 => 
  array (
    'id' => 4,
    'title' => 'Cloud Architecture',
    'meta_title' => NULL,
    'slug' => 'cloud-architecture',
    'has_custom_page' => true,
    'icon' => 'cloud',
    'hero_image' => 'services/01M0NTKWRAK9NG3CRQCQNT1ZZH.png',
    'short_description' => 'We design and deploy enterprise-grade cloud environments that ensure your applications are secure, performant, and ready to scale. From cost-optimized VPS setups to complex multi-region clusters, we build the foundation for your digital growth.',
    'content' => '<p>At <strong>Accelerate Lab</strong>, we treat infrastructure as the bedrock of software reliability. A poorly configured server can bottleneck even the most well-written application. Our cloud architecture services focus on eliminating single points of failure and optimizing resource utilization to balance performance with cost-efficiency.</p><p>For Indonesian SMEs and growing enterprises, we prioritize <strong>secure-by-default</strong> configurations. We implement Virtual Private Clouds (VPC), automated backups, and Web Application Firewalls (WAF) to protect your business data. Whether you are migrating from legacy on-premise servers or optimizing an existing cloud footprint, we provide the technical expertise to ensure a seamless, zero-downtime transition.</p>',
    'sort_order' => 4,
    'features' => 
    array (
      0 => 
      array (
        'title' => 'Reliability First',
        'icon' => 'verified_user',
        'description' => 'We architect for 99.9% uptime using industry-proven failover strategies.',
      ),
      1 => 
      array (
        'title' => 'Security Hardened',
        'icon' => 'admin_panel_settings',
        'description' => 'Implementation of strict firewall rules, SSH hardening, and SSL/TLS encryption.',
      ),
      2 => 
      array (
        'title' => 'Performance Tuning',
        'icon' => 'speed',
        'description' => 'Deep-level optimization of OS kernels, web servers, and database engines.',
      ),
      3 => 
      array (
        'title' => 'Vendor Agnostic',
        'icon' => 'shuffle',
        'description' => 'We recommend the best platform for your specific budget and technical needs.',
      ),
    ),
    'technologies' => 
    array (
      0 => 
      array (
        'name' => 'AWS',
        'icon' => 'cloud_queue',
      ),
      1 => 
      array (
        'name' => 'DigitalOcean',
        'icon' => 'cloud_queue',
      ),
      2 => 
      array (
        'name' => 'Google Cloud',
        'icon' => 'cloud_queue',
      ),
      3 => 
      array (
        'name' => 'Docker',
        'icon' => 'settings_suggest',
      ),
      4 => 
      array (
        'name' => 'Kubernetes',
        'icon' => 'settings_suggest',
      ),
      5 => 
      array (
        'name' => 'Nginx',
        'icon' => 'lan',
      ),
      6 => 
      array (
        'name' => 'Apache',
        'icon' => 'lan',
      ),
      7 => 
      array (
        'name' => 'Traefik',
        'icon' => 'lan',
      ),
      8 => 
      array (
        'name' => 'Terraform',
        'icon' => 'terminal',
      ),
      9 => 
      array (
        'name' => 'Ansible',
        'icon' => 'terminal',
      ),
      10 => 
      array (
        'name' => 'CI/CD',
        'icon' => 'terminal',
      ),
    ),
    'process' => 
    array (
      0 => 
      array (
        'title' => 'Infrastructure Audit',
        'description' => 'We analyze current workloads, traffic patterns, and bottlenecks.',
      ),
      1 => 
      array (
        'title' => 'Architecture Design',
        'description' => 'Drafting a blueprint that includes load balancing, database clusters, and caching layers.',
      ),
      2 => 
      array (
        'title' => 'Environment Provisioning',
        'description' => 'Using Infrastructure as Code (IaC) to create repeatable and documented server environments.',
      ),
      3 => 
      array (
        'title' => 'Data Migration',
        'description' => 'Executing secure data transfers with minimal to zero service interruption.',
      ),
      4 => 
      array (
        'title' => 'Monitoring & Alerting',
        'description' => 'Setting up real-time observability tools to detect and resolve issues before they affect users.',
      ),
    ),
    'cta_text' => 'Consult Your Infrastructure',
    'category' => 'development',
    'headline' => 'High-Availability Infrastructure Engineered for Resilience and Scale',
    'benefits' => 
    array (
      0 => 'Elastic Scalability: Infrastructure that grows automatically based on real-time traffic demands.',
      1 => 'Maximum Uptime: High-availability configurations designed to survive hardware or regional failures.',
      2 => 'Cost Management: Strategic resource allocation to ensure you only pay for what you actually use.',
      3 => 'Automated Backups: Robust disaster recovery plans with regular, verified data snapshots.',
      4 => 'DevOps Integration: Seamless CI/CD pipelines for rapid, low-risk software deployments.',
    ),
  ),
);

        Service::where('slug', 'odoo-erp-implementation')->delete();

        foreach ($services as $s) {
            Service::updateOrCreate(
                ['slug' => $s['slug']],
                $s
            );
        }
    }
}
