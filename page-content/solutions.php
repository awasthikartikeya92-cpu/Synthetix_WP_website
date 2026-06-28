<?php
/**
 * /solutions page — Elementor page data config
 *
 * This file defines the content for each solution block as a PHP array.
 * A developer copies these values into the Elementor editor for each
 * synthetix_solution_block widget instance.
 *
 * Source: WPC-Synthetix-Solutions.docx (verbatim)
 */

return [

    'page_title' => 'Solutions',
    'page_slug'  => 'solutions',
    'hero' => [
        'eyebrow' => 'Solutions',
        'heading' => 'One Platform. Four Enterprise Outcomes.',
        'body'    => 'Enterprise software delivery spans four distinct operational demands: building net-new capability, modernizing legacy estates, sustaining production applications, and governing complex infrastructure. Synthetix addresses all four through a single coordinated agent layer — the same governance framework, the same evidence pipeline, the same audit trail.',
    ],

    'solutions' => [

        /* ── 01 Greenfield ── */
        [
            'brand_frame'       => 'Imagine.',
            'solution_name'     => 'Greenfield Development',
            'solution_intro'    => 'Translating business intent into governed, release-ready software is where most AI tools reach their limit. Synthetix does not assist engineers — it deploys a coordinated agent team that owns the full delivery arc: requirements, architecture, build, test, and governance. Your leadership directs outcomes, not keystrokes.',
            'agents_do'         => [
                'Interpret business briefs and produce structured capability requirements grounded in technical and market evidence',
                'Generate target-state architecture aligned to your technology standards, platform contracts, and compliance obligations',
                'Produce sign-off-ready work breakdowns with risk-adjusted timelines a CFO and PMO can defend in the steering committee',
                'Stand up application scaffolds, APIs, infrastructure, and CI/CD pipelines in parallel',
                'Gate every artifact through the Critic agent before any output reaches a human reviewer',
            ],
            'outcomes'          => [
                [ 'stat' => '14 → 2 weeks',  'stat_label' => 'from business brief to working scaffold' ],
                [ 'stat' => 'Zero',           'stat_label' => 'boilerplate written by hand' ],
                [ 'stat' => '85%+',           'stat_label' => 'test coverage from day one' ],
            ],
            'for_text'          => 'CTOs accelerating product delivery, platform teams establishing new services, business units launching regulated digital capability.',
            'agents_engaged'    => 'Scout · Architect · Estimator · Critic · Conductor · Examiner',
            'typical_engagement'=> 'New customer portal, partner API platform, regulated workflow automation, internal capability launch. 4–12 weeks to production.',
        ],

        /* ── 02 Code Modernization ── */
        [
            'brand_frame'       => 'Reimagine.',
            'solution_name'     => 'Code Modernization',
            'solution_intro'    => 'Enterprise modernization programs fail at discovery — not delivery. Organizations invest months in SME interviews, manual dependency mapping, and stale documentation before a single line of target-state code is written. Synthetix compresses that pre-delivery burden into days and executes migration at program scale, in parallel waves, under full governance.',
            'agents_do'         => [
                'Comprehend legacy estates at path level across VB6, COBOL, PowerBuilder, RPG, Java, Kotlin, PHP, and mainframe',
                'Construct the Atlas knowledge graph — code, IaC, topology, integrations, and data lineage unified into one queryable model',
                'Generate target-state architecture with risk-scored dependency vectors and wave sequencing your steering committee can approve',
                'Execute migration across thousands of files simultaneously through coordinated agent swarms',
                'Enforce Critic and Gatekeeper gates on every wave — no unsafe change advances without policy clearance',
            ],
            'outcomes'          => [
                [ 'stat' => '1.5M+',   'stat_label' => 'lines of code per engagement' ],
                [ 'stat' => '1/10th',  'stat_label' => 'the cost of consulting-led modernization' ],
                [ 'stat' => '10x',     'stat_label' => 'faster discovery and planning' ],
            ],
            'for_text'          => 'CIOs retiring legacy stacks, transformation programs stalled by estate complexity, financial services and insurance organizations with mainframe and 4GL dependencies.',
            'agents_engaged'    => 'Cartographer · Architect · Estimator · Critic · Conductor · Examiner · Gatekeeper',
            'typical_engagement'=> 'Mainframe-to-cloud migration, VB6 desktop replacement, monolith decomposition, language modernization. 6–18 months to estate complete.',
        ],

        /* ── 03 Application Support ── */
        [
            'brand_frame'       => 'Evolve.',
            'solution_name'     => 'Application Support',
            'solution_intro'    => 'Production application support is a high-volume, high-repetition workload that consumes disproportionate senior engineering capacity. Synthetix changes that operating model — agents triage, investigate, and propose resolutions with evidence-backed precision, escalating to engineering only when judgment is required.',
            'agents_do'         => [
                'Classify and triage incoming incidents against the Atlas knowledge graph, correlating signals across services and infrastructure layers',
                'Conduct root-cause analysis with confidence-scored evidence chains traceable to specific code paths and integration dependencies',
                'Generate fix proposals and verified hotfix branches that clear the Examiner gate before human review',
                'Refresh runbooks and technical documentation continuously as production systems evolve',
                'Capture tribal knowledge through the Mentor agent during every resolution cycle, feeding institutional intelligence back to the platform',
            ],
            'outcomes'          => [
                [ 'stat' => '9/10',   'stat_label' => 'incidents triaged and resolved autonomously' ],
                [ 'stat' => '2/3',    'stat_label' => 'of L1/L2 support effort reclaimed' ],
                [ 'stat' => '24/7',   'stat_label' => 'continuous always-on coverage' ],
            ],
            'for_text'          => 'Application support organizations, on-call engineering teams under capacity pressure, and regulated industries requiring audit-grade incident handling and documented resolution trails.',
            'agents_engaged'    => 'Cartographer · Critic · Examiner · Gatekeeper · Mentor',
            'typical_engagement'=> 'Embedded into your support workflow alongside Jira, PagerDuty, Slack, Teams, and your observability stack. Continuous operation from day one.',
        ],

        /* ── 04 Infrastructure Support ── */
        [
            'brand_frame'       => 'Evolve.',
            'solution_name'     => 'Infrastructure Support',
            'solution_intro'    => 'Infrastructure operations in regulated enterprises carry compounding risk. Configuration drift accumulates silently, IaC diverges from deployed state, and change control processes struggle to keep pace with the rate of infrastructure events across cloud, hybrid, and on-prem environments. Manual review cannot scale to the surface area. Synthetix addresses this at the estate level — with continuous intelligence, policy-gated remediation, and zero ungated changes.',
            'agents_do'         => [
                'Comprehend IaC across Terraform, Ansible, CloudFormation, Pulumi, Crossplane, and Helm',
                'Detect drift between declared state and observed reality across cloud, hybrid, and on-prem environments',
                'Map network topology and service mesh end-to-end across VMware, Kubernetes, fabric, and routing layers',
                'Generate remediation proposals with four-tier change classification and policy gate enforcement before any action reaches production',
                'Refresh infrastructure runbooks from live topology — documentation that remains accurate under operational pressure',
            ],
            'outcomes'          => [
                [ 'stat' => 'Zero',   'stat_label' => 'unverified configuration changes' ],
                [ 'stat' => '100%',   'stat_label' => 'topology coverage across the estate' ],
                [ 'stat' => 'Real-time', 'stat_label' => 'drift detection and reconciliation' ],
            ],
            'for_text'          => 'Platform engineering, SRE, cloud and network operations, and infrastructure security teams managing compliance across complex regulated estates.',
            'agents_engaged'    => 'Cartographer · Architect · Examiner · Gatekeeper · Mentor',
            'typical_engagement'=> 'Continuous. Air-gappable and on-premises deployment options available for regulated and sovereign environments. Integrates with your observability stack and ticketing platform.',
        ],
    ],

    'footer_band' => [
        'heading' => 'The platform behind every solution',
        'body'    => 'Each workflow runs on the same Conductor orchestration pipeline, draws intelligence from the same Atlas knowledge graph, and is governed by the same configurable HITL checkpoints and policy gate framework. One command layer. Four enterprise outcomes.',
        'cta_primary'   => 'REQUEST A TAILORED DEMO',
        'cta_secondary' => 'SEE THE PLATFORM',
        'cta_secondary_url' => '/platform',
    ],
];
