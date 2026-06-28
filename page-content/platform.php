<?php
/**
 * Content reference for /platform Elementor page build.
 * All copy is verbatim from WPC-Synthetix-Platform.docx.
 *
 * Widget usage:
 *   Hero          → Agenio Hero widget (built-in)
 *   Pipeline      → Elementor_Synthetix_Pipeline_Widget
 *   Conductor     → Two-column section + feature lists (Agenio built-in)
 *   Atlas         → Two-column section + bullet lists (Agenio built-in)
 *   Integrations  → Elementor_Synthetix_Integrations_Grid_Widget
 *   CTA           → Agenio CTA Band widget (built-in)
 */

// ── HERO ──────────────────────────────────────────────────────────────────────
$hero = [
    'eyebrow'  => '— Platform',
    'heading'  => 'The command layer that builds, modernizes, and operates your enterprise estate.',
    'body'     => 'Most enterprises run on systems that are too complex to change fast and too critical to change wrong. Synthetix changes that. One governed pipeline that builds new applications, modernizes legacy estates, and keeps production systems running, with full human oversight at every stage that matters.',
    'cta_1'    => ['label' => 'Book a Platform Walkthrough', 'url' => '/company/contact/', 'style' => 'primary'],
    'cta_2'    => ['label' => 'Meet the Agents',             'url' => '/agents/',           'style' => 'outline'],
];

// ── 01 / PIPELINE ─────────────────────────────────────────────────────────────
// Widget: Elementor_Synthetix_Pipeline_Widget
$pipeline = [
    'section_eyebrow' => '— 01 / How It Works',
    'section_title'   => 'The pipeline.',
    'section_intro'   => 'Discover → Analyze → Architect → Build → Verify → Govern. Agents flow work between stages with confidence-scored evidence at every step.',
    'section_style'   => 'dark-2',
    'stages' => [
        [
            'stage_number' => '— 01',
            'stage_name'   => 'Discover',
            'stage_desc'   => 'Agents ingest the brief, the estate, or the incident. Identify scope, constraints, regulatory posture, and what\'s already known vs. needs investigation.',
            'stage_agents' => 'Scout, Cartographer',
        ],
        [
            'stage_number' => '— 02',
            'stage_name'   => 'Analyze',
            'stage_desc'   => 'Path-level comprehension. Cartographer builds the Atlas graph: code, IaC, topology, integrations, data. Risk vectors identified with confidence scores.',
            'stage_agents' => 'Cartographer, Scout',
        ],
        [
            'stage_number' => '— 03',
            'stage_name'   => 'Architect',
            'stage_desc'   => 'Target-state design grounded in the analysis. Estimator sizes the work. Critic reviews the architecture for drift, gaps, and unsafe choices before human gate.',
            'stage_agents' => 'Architect, Estimator, Critic',
        ],
        [
            'stage_number' => '— 04',
            'stage_name'   => 'Build',
            'stage_desc'   => 'Generation agents work in parallel waves to produce code, infrastructure, integrations. Conductor maintains delivery rhythm; Mentor surfaces guidance in-IDE.',
            'stage_agents' => 'Builder Swarm, Conductor, Mentor',
        ],
        [
            'stage_number' => '— 05',
            'stage_name'   => 'Verify',
            'stage_desc'   => 'Examiner generates and runs tests. Coverage threshold gating. Failed units route back to the swarm. Performance against your SLAs measured before promotion.',
            'stage_agents' => 'Examiner, Critic',
        ],
        [
            'stage_number' => '— 06',
            'stage_name'   => 'Govern',
            'stage_desc'   => 'Gatekeeper enforces policy, change classification, and audit. Provenance recorded for every decision. Human approval at promotion. Reversible by design.',
            'stage_agents' => 'Gatekeeper',
        ],
    ],
];

// ── 02 / CONDUCTOR ────────────────────────────────────────────────────────────
// Widget: Agenio Two-Column section
$conductor = [
    'section_eyebrow' => '— 02 / Orchestration',
    'section_title'   => 'Conductor.',
    'section_style'   => 'dark',
    'left' => [
        'subtitle' => 'The orchestration engine. Manages delivery state, parallelism, dependencies, and wave coordination across every active engagement.',
        'body'     => 'Conductor is the runtime that makes the pipeline repeatable, observable, and reversible. It schedules agent runs, routes their outputs to the next stage, enforces gates, and gives you a portfolio view across multiple engagements.',
        'callout'  => 'Note: "Conductor" the orchestrator is distinct from "Conductor" the agent (which handles program rhythm and stakeholder narrative). The pipeline runs them together.',
    ],
    'right' => [
        'module_delivery_states' => [
            'heading' => 'Module Delivery States',
            'items'   => [
                'Per-module progress tracking with confidence at each stage',
                'Reversible waves with audit-grade rollback',
                'Cross-engagement dependency mapping',
            ],
        ],
        'portfolio_operations' => [
            'heading' => 'Portfolio Operations',
            'items'   => [
                'Multi-tenant runs across business units',
                'Resource governance and budget controls',
                'Real-time risk surface across active programs',
            ],
        ],
    ],
];

// ── 03 / ATLAS ────────────────────────────────────────────────────────────────
$atlas = [
    'section_eyebrow' => '— 03 / Knowledge',
    'section_title'   => 'Atlas.',
    'section_style'   => 'light',
    'left' => [
        'subtitle' => 'The knowledge graph. A cross-domain, queryable model of your estate — code, infrastructure, topology, integrations, data lineage as one connected world.',
        'body'     => 'Most AI tools see the file in the editor. Atlas sees the entire estate as one graph including every function call, every IaC dependency, every API contract, every data table, every service mesh route. Agents query Atlas before they act.',
    ],
    'right' => [
        'what_atlas_indexes' => [
            'heading' => 'What Atlas indexes',
            'items'   => [
                'Application code at path level, across every supported language',
                'Infrastructure as code: Terraform, Ansible, Helm, CloudFormation',
                'Network and service topology including K8s and VMware',
                'Integration contracts: REST, GraphQL, message buses, batch feeds',
                'Data lineage across schemas, lakes, and streams',
            ],
        ],
        'what_you_get' => [
            'heading' => 'What you get',
            'items'   => [
                'Estate intelligence dashboard with concentration mapping',
                'Drift detection between declared and observed reality',
                'Blast-radius queries for any proposed change',
                'Provenance trace from any artifact back to its origin',
                'Cross-engagement institutional memory that compounds',
            ],
        ],
    ],
];

// ── 04 / INTEGRATIONS ─────────────────────────────────────────────────────────
// Widget: Elementor_Synthetix_Integrations_Grid_Widget
$integrations = [
    'section_eyebrow' => '— 04 / Integrations',
    'section_title'   => 'Slots into your stack.',
    'section_intro'   => 'No rip and replace. Synthetix plugs into your existing source control, CI/CD, observability, identity, and cloud from day one.',
    'section_style'   => 'dark-2',
    'groups' => [
        ['group_name' => 'Source Control',       'tool_names' => "GitHub\nGitLab\nBitbucket\nAzure DevOps\nself-hosted Git"],
        ['group_name' => 'CI / CD',              'tool_names' => "Jenkins\nGitHub Actions\nGitLab CI\nAzure Pipelines\nArgo\nCircleCI"],
        ['group_name' => 'Observability',        'tool_names' => "Datadog\nSplunk\nGrafana\nNew Relic\nDynatrace\nOpenTelemetry"],
        ['group_name' => 'Cloud & On-Prem',      'tool_names' => "AWS\nAzure\nGCP\nVMware\nOpenShift\nair-gapped"],
        ['group_name' => 'Infrastructure as Code','tool_names' => "Terraform\nAnsible\nCloudFormation\nPulumi\nCrossplane\nHelm"],
        ['group_name' => 'Identity & Secrets',   'tool_names' => "Okta\nAzure Entra ID\nPing\nHashiCorp Vault\nCyberArk\nAWS Secrets Manager"],
        ['group_name' => 'Knowledge & PM',       'tool_names' => "Jira\nLinear\nConfluence\nNotion\nSharePoint\nAzure Boards"],
        ['group_name' => 'Communications',       'tool_names' => "Slack\nMicrosoft Teams\nEmail\nPagerDuty\ncustom webhooks"],
    ],
];

// ── CTA ───────────────────────────────────────────────────────────────────────
$cta = [
    'eyebrow'  => '— Begin',
    'heading'  => 'See the platform in motion.',
    'cta_1'    => ['label' => 'Book a Platform Walkthrough', 'url' => '/company/contact/', 'style' => 'primary'],
    'cta_2'    => ['label' => 'Meet the Agents',             'url' => '/agents/',           'style' => 'outline'],
];
