<?php
/**
 * /agents page — content config (source: WPC-Synthetix-Agents.docx, verbatim)
 *
 * Developer: copy each agent's values into the corresponding
 * synthetix_agent_card widget instance in Elementor.
 */

return [

    'page_title' => 'Agents',
    'page_slug'  => 'agents',

    'hero' => [
        'eyebrow' => 'Agent Workforce',
        'heading' => 'A workforce built for enterprise scale.',
        'body'    => 'Nine specialist agents. Each owns a discrete function in the delivery chain including comprehension, strategy, forecasting, quality assurance, orchestration, verification, governance, intelligence, and engineering guidance. They operate in sequence, hand off to each other without human coordination overhead, and escalate only when a decision requires human judgment. Listed below in the order they engage.',
    ],

    'workflow_band' => [
        'title'   => 'Autonomous handoffs. Accountable outcomes.',
        'body'    => 'Cartographer maps the estate. Architect generates the target state. Estimator produces the defensible plan. Critic audits every output before it moves. Human gate. The Builder swarm executes. Examiner validates. Gatekeeper enforces policy and closes the audit trail. Human gate. Seven autonomous handoffs. Two human approvals. Full program accountability at each stage.',
        'summary' => 'Seven autonomous handoffs. Two human approvals. Full program accountability at each stage.',
    ],

    'agents' => [

        [
            'number'   => '01',
            'name'     => 'CARTOGRAPHER',
            'stage'    => 'Discover, Analyze',
            'role'     => 'Comprehension',
            'headline' => 'Full estate comprehension before a single line changes.',
            'body'     => 'Cartographer is the first agent to engage on any program. It performs path-level analysis across source code, infrastructure as code, network topology, integration surfaces, and data lineage — and materializes that understanding into the Atlas knowledge graph. Every agent that follows operates against that graph. Without Cartographer, downstream decisions are assumptions. With it, they are grounded positions.',
            'inputs'   => [
                'Source repositories across all supported languages and frameworks',
                'IaC modules, Helm charts, Kubernetes manifests, Terraform state',
                'Observability feeds, topology data, and integration catalogs',
            ],
            'outputs'  => [
                'The Atlas knowledge graph, scoped to the engagement',
                'Path-level comprehension with confidence scoring per domain',
                'Risk vectors and concentration points flagged for downstream review',
            ],
        ],

        [
            'number'   => '02',
            'name'     => 'ARCHITECT',
            'stage'    => 'Architect',
            'role'     => 'Strategy',
            'headline' => 'Target-state design grounded in what the estate actually is.',
            'body'     => 'Architect consumes the Atlas graph produced by Cartographer and generates a target-state architecture that reflects the actual system, not an idealized abstraction of it. It applies your platform contracts and technology standards, identifies migration risk vectors, proposes wave sequencing for phased execution, and produces architecture artifacts that are reviewable and defensible at the CTO and enterprise architecture level.',
            'inputs'   => [
                'Atlas knowledge graph from Cartographer',
                'Business brief, capability requirements, and desired outcomes',
                'Organization\'s technology radar and approved platform standards',
            ],
            'outputs'  => [
                'Target-state architecture document, ready for human sign-off',
                'Risk register with migration exposure and mitigation options',
                'Wave sequencing and capability briefs passed to Estimator',
            ],
        ],

        [
            'number'   => '03',
            'name'     => 'ESTIMATOR',
            'stage'    => 'Architect',
            'role'     => 'Forecasting',
            'headline' => 'Program economics your CFO and PMO can stand behind.',
            'body'     => 'Estimator sizes the delivery program against the Architect\'s plan and the Atlas graph. Work breakdowns are constructed with explicit acceleration factors applied at the work-package level — identifying what agents compress, what they cannot, and where genuine human effort remains non-negotiable. The output is a risk-adjusted timeline and cost forecast built on evidence, not precedent. A plan the finance committee can interrogate and the program office can execute against.',
            'inputs'   => [
                'Architect\'s target-state plan and wave sequencing',
                'Atlas graph for scope quantification and complexity assessment',
                'Historical run telemetry from prior Synthetix engagements',
            ],
            'outputs'  => [
                'Work breakdown structure with per-package acceleration factors',
                'Risk-adjusted timeline and cost forecast by wave',
                'Resource and budget projections formatted for PMO and CFO review',
            ],
        ],

        [
            'number'   => '04',
            'name'     => 'CRITIC',
            'stage'    => 'All stages',
            'role'     => 'Quality',
            'headline' => 'Scope drift and hallucinations stopped before human review.',
            'body'     => 'Critic operates as a cross-cutting quality function across the entire pipeline. It reviews every agent output — architecture documents, estimates, generated code, test suites, governance artifacts — for hallucination, scope drift, unsafe change proposals, and structural instability, all before any artifact reaches a human reviewer. Outputs that fail review are returned to the originating agent with specific, traceable revision guidance. Resolution typically completes within two autonomous cycles. Human escalation is reserved for genuine uncertainty that cannot be resolved within the agent layer.',
            'inputs'   => [
                'Outputs from every agent at each pipeline stage',
                'Atlas graph as the evidentiary baseline for grounding checks',
                'Your organizational standards and compliance posture',
            ],
            'outputs'  => [
                'Pass or revise verdict with a confidence score per artifact',
                'Targeted revision instructions routed back to the source agent',
                'Escalation to human reviewers when Critic confidence falls below threshold',
            ],
        ],

        [
            'number'   => '05',
            'name'     => 'CONDUCTOR',
            'stage'    => 'Build, all stages',
            'role'     => 'Orchestration',
            'headline' => 'Delivery cadence, dependency management, and stakeholder narrative across every run.',
            'body'     => 'Conductor the agent owns the delivery rhythm of the program. It tracks module state across waves, surfaces what is in flight, what is blocked, and what is approaching risk thresholds — and translates that picture into stakeholder communication calibrated by audience and urgency. It pairs with the Conductor orchestration engine (the platform runtime responsible for module coordination and wave mechanics) to provide both execution visibility and the narrative layer that keeps programs aligned.

Note: Conductor the agent narrates program progress. Conductor the orchestrator runs the platform. They share a name because they share a purpose.',
            'inputs'   => [
                'Conductor orchestrator state across active modules and wave cohorts',
                'Risk register from Architect and Estimator',
                'External signals from project management tools and observability platforms',
            ],
            'outputs'  => [
                'Real-time delivery dashboard for program leadership',
                'Stakeholder status updates calibrated to audience and escalation level',
                'Dependency conflict surfacing and risk escalation for human decision',
            ],
        ],

        [
            'number'   => '06',
            'name'     => 'EXAMINER',
            'stage'    => 'Verify',
            'role'     => 'Verification',
            'headline' => 'Verification against real behavior, not happy-path assumptions.',
            'body'     => 'Examiner generates and executes tests across unit, integration, and contract surfaces. Coverage gating is configurable by change class, with an 85% threshold applied by default. Units that fail are returned to the Builder swarm with specific diagnostic context rather than a generic failure signal. Test assertions are grounded in production traces and behavioral specifications — not generated boilerplate. Examiner\'s output is the verification layer that Gatekeeper depends on before any promotion decision is made.',
            'inputs'   => [
                'Code and infrastructure artifacts from the Builder swarm',
                'Behavioral specifications from the Architect',
                'Production traces, where available, for golden-path test generation',
            ],
            'outputs'  => [
                'Test suite with meaningful assertions at unit, integration, and contract levels',
                'Coverage report validated against configurable gating thresholds',
                'Pass or fail verdict per unit with full diagnostic context for remediation',
            ],
        ],

        [
            'number'   => '07',
            'name'     => 'GATEKEEPER',
            'stage'    => 'Govern',
            'role'     => 'Governance',
            'headline' => 'Policy-enforced promotion with a signed audit trail on every change.',
            'body'     => 'Gatekeeper is the governance and compliance enforcement layer at the close of the pipeline. It applies four-tier change classification to every verified artifact, enforces your organization\'s security and compliance policy, and produces a signed evidence chain covering each promotion decision. Changes can be reversed at the wave level without cascading rollback complexity. For organizations in regulated industries — financial services, healthcare, insurance, government — Gatekeeper is the mechanism that makes autonomous delivery auditable and enterprise-viable.',
            'inputs'   => [
                'Verified artifacts and coverage reports from Examiner',
                'Your policy library, compliance posture, and regulatory requirements',
                'Change classification rules and the approval authority graph',
            ],
            'outputs'  => [
                'Promote, hold, or reject verdict with rationale per change unit',
                'Signed evidence chain covering every classification and enforcement decision',
                'Audit-ready artifact for internal governance, external audit, and regulatory review',
            ],
        ],

        [
            'number'   => '08',
            'name'     => 'SCOUT',
            'stage'    => 'Discover, cross-cutting',
            'role'     => 'Intelligence',
            'headline' => 'Evidence-grounded intelligence at the pace the engagement demands.',
            'body'     => 'Scout is the research and intelligence function of the platform. When a program requires regulatory landscape analysis, technology comparison, vendor evaluation, or a briefing for the steering committee, Scout produces it — with provenance on every claim and output calibrated to the intended audience. Scout operates across the delivery lifecycle, not just at initiation. It surfaces competitive and compliance signals as they become relevant, and formats outputs for the decision-making context in which they will be consumed.',
            'inputs'   => [
                'Research mandates from Architect, Conductor, or authorized human stakeholders',
                'Approved internal and external knowledge sources',
                'Audience context and output format requirements',
            ],
            'outputs'  => [
                'Technical and regulatory briefs with source provenance on every claim',
                'Presentation decks and comparison matrices calibrated by audience',
                'Competitive and compliance landscape analysis for program and commercial decisions',
            ],
        ],

        [
            'number'   => '09',
            'name'     => 'MENTOR',
            'stage'    => 'Cross-cutting, Evolve',
            'role'     => 'Guidance',
            'headline' => 'Institutional knowledge, embedded in the tools your engineers already use.',
            'body'     => 'Mentor is the engineer-facing agent, operating in the IDE, in the team chat, and in the ticket system. It answers questions grounded in the Atlas graph, explains generated code in context, surfaces prior decisions and architectural standards, and captures the tribal knowledge that typically walks out the door with attrition. As engineers interact with Mentor, the platform\'s institutional memory grows. That knowledge feeds subsequent programs, shortens onboarding cycles, and reduces dependency on any single contributor.',
            'inputs'   => [
                'Engineer questions, active code context, and debugging sessions',
                'Atlas graph and the platform\'s accumulated institutional memory',
                'Documentation, runbooks, architectural decisions, and prior program artifacts',
            ],
            'outputs'  => [
                'In-context guidance and answers delivered in the IDE or team chat',
                'Captured tribal knowledge persisted to the platform for future programs',
                'Structured onboarding pathways for incoming engineering team members',
            ],
        ],
    ],

    'cta' => [
        'heading'   => 'See the workforce in a live program.',
        'cta_primary'   => 'REQUEST A LIVE DEMO',
        'cta_secondary' => 'Explore Governance',
        'cta_secondary_url' => '/governance',
    ],
];
