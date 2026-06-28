<?php
/**
 * Content reference for /why Elementor page build.
 * All copy is verbatim from WPC-Synthetix-Why_Synthetix.docx.
 *
 * Widget usage:
 *   Hero             → Agenio Hero widget (built-in)
 *   Competitor cards → Agenio Card widget ×3 (built-in)
 *   Comparison table → Elementor_Synthetix_Comparison_Table_Widget
 *   Persona grid     → Elementor_Synthetix_Persona_Grid_Widget
 *   Business case    → Elementor_Synthetix_Data_Table_Widget
 *   Proof run        → Two-column section + bullet list (Agenio built-in)
 *   CTA              → Agenio CTA Band widget (built-in)
 */

// ── HERO ──────────────────────────────────────────────────────────────────────
$hero = [
    'eyebrow'  => '— Why Synthetix',
    'heading'  => 'Built for enterprises that cannot afford to get AI wrong.',
    'body'     => 'Enterprise software delivery has a structural problem. The tools your teams are using today were built to assist individuals, not to govern programs. When the buying committee asks why Synthetix, the answer is not a feature comparison — it is a fundamentally different execution model.',
];

// ── 01 / VS COMPETITORS ───────────────────────────────────────────────────────
$competitors = [
    'section_eyebrow' => '— vs Competitors',
    'section_title'   => 'Agentic execution versus assistive suggestion.',
    'section_intro'   => 'Most AI tools on the market today operate in the same category: they accelerate individual effort. A developer writes faster, searches smarter, or generates a scaffold in seconds. The productivity gain is real. The delivery problem remains.',
    'section_body'    => 'Synthetix does not compete in the copilot category. It operates in a category of one: governed agentic delivery — where specialist agents own workflow stages, review each other\'s output, enforce policy, and produce signed audit evidence across the full program lifecycle.',
    'competitor_cards' => [
        [
            'name' => 'GitHub Copilot / Cursor',
            'body' => 'Copilots augment the individual contributor. They operate at file and repository scope, respond to a prompt, and forget the context between sessions. There is no workflow awareness, no estate intelligence, no cross-agent review, and no governance trail. For a single developer, the value is clear. For a regulated program spanning thirty legacy systems, the gap is structural.',
        ],
        [
            'name' => 'LangChain / Custom Agent Frameworks',
            'body' => 'Framework toolkits enable teams to wire together agent workflows — but the orchestration logic, governance controls, error handling, and estate context all remain the responsibility of the engineering team. What looks like a platform is an integration project. Time-to-value extends from weeks into quarters, and the output is as auditable as the team has time to make it.',
        ],
        [
            'name' => 'Devin / Blitzy',
            'body' => 'Autonomous coding agents extend the copilot model toward end-to-end task completion. The demos are compelling. The production record in regulated, complex estates — where audit trails, policy gates, and multi-domain dependencies are non-negotiable — is limited. These tools solve a development throughput problem. Synthetix solves a program governance problem.',
        ],
    ],
    'distinction_heading' => 'Where Synthetix is distinct',
    'distinction_body'    => 'The distinction is not speed of code generation. It is whether the platform can run a governed modernization program, produce defensible audit evidence, and operate within the risk and compliance requirements of a regulated enterprise without the CTO rebuilding the governance layer themselves.',
];

// ── COMPARISON TABLE ──────────────────────────────────────────────────────────
// Widget: Elementor_Synthetix_Comparison_Table_Widget
$comparison = [
    'section_style'   => 'light',
    'column_headers'  => "Capability\nSynthetix\nCopilots\nAgent Frameworks\nAutonomous Coders",
    // first data column (Synthetix) is auto-highlighted
    'rows' => [
        ['feature' => 'Scope',                'cells' => "Full estate\nFile / repo\nWorkflow\nTask"],
        ['feature' => 'Context',              'cells' => "Live knowledge graph\nPrompt session\nWired pipeline\nPrompt session"],
        ['feature' => 'Review mechanism',     'cells' => "Critic + Examiner agents\nNone\nDIY\nNone"],
        ['feature' => 'Governance',           'cells' => "Policy gates + provenance\nNone\nDIY\nPartial logs"],
        ['feature' => 'Human control',        'cells' => "Configurable HITL per gate\nPrompt-level\nWorkflow-level\nTask-level"],
        ['feature' => 'Deployment',           'cells' => "SaaS, on-prem, air-gap\nCloud\nCloud / self-host\nCloud"],
        ['feature' => 'Regulated industry fit','cells' => "Built for it\nLimited\nVariable\nLimited"],
    ],
];

// ── STAKEHOLDER PERSONA GRID ──────────────────────────────────────────────────
// Widget: Elementor_Synthetix_Persona_Grid_Widget
$personas = [
    'section_eyebrow' => '— Stakeholder Value',
    'section_title'   => 'Every seat at the buying table has a different question.',
    'section_intro'   => 'Enterprise software programs do not get approved by one executive. They move through a buying committee and each stakeholder evaluates the platform through the lens of their own accountability. Synthetix is designed to speak to all of them.',
    'personas' => [
        [
            'persona_role'    => 'CIO / CTO',
            'accountability'  => 'Modernization velocity without uncontrolled AI risk.',
            'persona_body'    => 'The CTO\'s core tension in 2026 is not whether to deploy AI in the delivery pipeline; it is whether they can deploy it without introducing governance liabilities that exceed the speed gains. Synthetix resolves that tension. The nine-agent workforce operates within a governed pipeline, with configurable human gates, policy enforcement on every change, and signed provenance on every output. The result is an AI delivery program that the board can be briefed on and the auditor can review.',
        ],
        [
            'persona_role'    => 'Enterprise Architect',
            'accountability'  => 'Accurate system understanding and a defensible target-state design.',
            'persona_body'    => 'Legacy estate comprehension is the highest-friction, highest-risk phase of any modernization program. Architects spend months building a picture of the estate that is out of date before the program begins. The Cartographer and Atlas knowledge graph compress that cycle by producing a path-level, evidence-backed model of the estate that the Architect agent uses to generate a defensible target-state design. Every architectural decision traces to a source in the graph.',
        ],
        [
            'persona_role'    => 'CISO / Risk',
            'accountability'  => 'Auditability, policy control, and safe deployment.',
            'persona_body'    => 'For the CISO, the question is not whether Synthetix works; it is whether it can be trusted in a regulated environment. The answer rests on three foundations: configurable HITL checkpoints that keep humans in the loop at every gate the security team defines; policy enforcement baked into the Gatekeeper agent, not bolted on after generation; and signed provenance trails that produce audit-ready evidence without manual assembly. Air-gappable deployment ensures data never leaves the perimeter.',
        ],
        [
            'persona_role'    => 'CFO / Procurement',
            'accountability'  => 'A credible business case and measurable return on investment.',
            'persona_body'    => 'The CFO evaluates AI platform investments through a cost-reduction and risk lens. Synthetix reduces cost across five high-friction areas: legacy discovery, architecture planning, rework cycles, governance documentation, and SME dependency. The Business Case section below quantifies each lever. The CFO\'s minimum requirement — that the program can demonstrate measurable cost avoidance and time compression within a defined engagement window — is addressed by the proof-run model.',
        ],
        [
            'persona_role'    => 'PMO / Transformation Lead',
            'accountability'  => 'Predictable delivery waves and measurable progress.',
            'persona_body'    => 'Program management for a legacy modernization initiative typically involves assembling progress data from multiple teams, tools, and reporting cycles; often arriving too late to act on. The Conductor orchestration engine provides module-level status telemetry across every delivery state, from Discovered through Sealed. Wave dependencies, in-flight risks, and escalation signals are visible in one surface, not assembled from a portfolio of spreadsheets.',
        ],
        [
            'persona_role'    => 'Engineering Leadership',
            'accountability'  => 'Team productivity, quality standards, and knowledge retention.',
            'persona_body'    => 'Senior engineering leaders carry two risks that Synthetix directly addresses. The first is institutional knowledge concentration — the system understanding required to safely modify a thirty-year estate lives in the heads of two or three engineers. The Mentor agent captures tribal knowledge as it is used and converts it into reusable execution intelligence on the platform. The second is review quality at scale: the Critic and Examiner agents enforce code quality, test coverage gates, and scope-drift detection before output reaches human reviewers.',
        ],
        [
            'persona_role'    => 'Security Operations',
            'accountability'  => 'Policy-gated change control and compliance posture.',
            'persona_body'    => 'Security operations teams evaluate every change-producing system through the lens of blast radius and reversibility. Synthetix implements a four-tier change classification model enforced by the Gatekeeper agent. Every change is categorized, gated, and reversible. Policy rules authored by the security team are enforced on every agent-generated output before promotion. The audit trail is produced by default, not reconstructed after the fact.',
        ],
    ],
];

// ── BUSINESS CASE TABLE ───────────────────────────────────────────────────────
// Widget: Elementor_Synthetix_Data_Table_Widget
$business_case = [
    'section_eyebrow' => '— Business Case',
    'section_title'   => 'Where the cost comes out of the program.',
    'section_intro'   => 'Enterprise software programs carry five categories of cost that do not generate delivery value: the effort to understand what exists, the effort to plan what to build, the rework when the plan turns out to be wrong, the cost of assembling governance evidence, and the dependency on individuals who hold knowledge no one else has. Synthetix attacks all five.',
    'section_style'   => 'light',
    'col_a_header'    => 'Program Stage',
    'col_b_header'    => 'Traditional Cost Profile',
    'col_c_header'    => 'Synthetix Impact',
    'rows' => [
        ['col_a' => 'Legacy discovery',                  'col_b' => '4–12 weeks SME effort',                           'col_c' => 'Compressed to days'],
        ['col_a' => 'Architecture and estimation',        'col_b' => '3–6 weeks planning cycles',                       'col_c' => 'Produced from knowledge graph'],
        ['col_a' => 'Build and migration',                'col_b' => 'High rework rate from incomplete discovery',       'col_c' => 'Rework rate reduced by pre-promotion review gates'],
        ['col_a' => 'Governance documentation',           'col_b' => 'Manual assembly under audit pressure',             'col_c' => 'Captured by default during execution'],
        ['col_a' => 'Post-program knowledge retention',   'col_b' => 'Exits with the project team',                     'col_c' => 'Retained on platform as reusable intelligence'],
    ],
];

// ── PROOF-RUN & ROI ───────────────────────────────────────────────────────────
$proof_run = [
    'left' => [
        'heading' => 'Proof-run model',
        'body_1'  => 'Synthetix engagements begin with a bounded proof run against a real segment of the target estate. Within the first weeks, the platform produces: an estate comprehension report, a target-state architecture assessment, a wave plan with risk-adjusted estimates, and a governance provenance record — all generated against the actual environment, not a synthetic dataset.',
        'body_2'  => 'The proof run establishes the economic baseline and the delivery rhythm before a full program commitment is made.',
    ],
    'right' => [
        'heading' => 'The ROI model in summary',
        'bullets' => [
            '<strong>Cost reduction</strong> — discovery compression, planning acceleration, rework reduction, governance automation, and knowledge retention.',
            '<strong>Speed improvement</strong> — across every stage from brief to production-ready output.',
            '<strong>Risk reduction</strong> — policy-gated, evidence-backed, reversible change control in environments where a failed deployment is a regulated event, not just a rollback.',
        ],
        'footnote' => 'The business case for Synthetix is not built on benchmark throughput numbers. It is built on what a program director, CFO, and CISO can each defend to their board — a governed, auditable, and demonstrably faster path through the highest-cost phases of enterprise software delivery.',
    ],
];

// ── CTA ───────────────────────────────────────────────────────────────────────
$cta = [
    'heading' => 'See the platform running on a real estate.',
    'body'    => 'A proof run produces estate comprehension, architecture, wave plans, and governance evidence on your environment, in weeks.',
    'cta_1'   => ['label' => 'Request a Walkthrough', 'url' => '/company/contact/', 'style' => 'primary'],
];
