<?php
/**
 * /governance page — content config (source: WPC-Synthetix-Governance.docx, verbatim)
 *
 * Developer: copy each section's values into the corresponding widget in Elementor.
 * See CONTENT_MAP.md for widget-per-section mapping.
 */

return [

    'page_title' => 'Governance',
    'page_slug'  => 'governance',

    'hero' => [
        'eyebrow' => 'Governance',
        'heading' => 'Enterprise-grade governance for every agent, workflow, and regulated environment.',
        'body'    => 'Autonomous agents deliver material value only when the organisation retains full control of how they operate. Synthetix is built on that principle. Every agent action passes through a configurable human gate. Every decision carries a signed evidence trail. Every change is classified, policy-checked, and reversible before it reaches production. Your security team writes the rules, compliance function sets the thresholds, and risk appetite determines how much autonomy each workflow carries. Synthetix enforces it all, consistently, across every run, every environment, and every regulated domain you operate in.',
    ],

    /* ── 01 HITL — uses synthetix_data_table ── */
    'hitl' => [
        'eyebrow'      => '01 / Human-in-the-Loop',
        'title'        => 'Configure exactly where human judgment takes over.',
        'intro'        => '<p>Configure human review checkpoints per workflow, environment, and change classification. Three baseline operating modes. Infinite tuning.</p><p>Expand autonomy as confidence builds. Pull it back whenever the risk profile changes.</p><p>Start with maximum oversight on day one. Agents propose, your team decides, and nothing moves without explicit approval. As the platform accumulates confidence across successive runs, oversight parameters expand in step with demonstrated performance.</p><p>Mature continuous operations can reach high autonomy, where engineers receive exception escalations and periodic digests rather than reviewing every commit. Every autonomy setting is configurable at the environment level, the policy level, and the individual change classification level. You pull it back whenever the risk profile demands it.</p>',
        'col_a_header' => 'Mode',
        'col_b_header' => 'Agent Posture',
        'col_c_header' => 'Human Touchpoints',
        'rows'         => [
            [
                'col_a' => "Low Autonomy\n\nFirst engagement, tier-zero systems, regulated change classes.",
                'col_b' => 'Agents surface options with full evidence packages. Execution waits on human instruction.',
                'col_c' => 'Every change reviewed by an engineer before promotion.',
            ],
            [
                'col_a' => "Mid Autonomy\n\nDefault configuration for Greenfield and Modernization programs.",
                'col_b' => 'Agents draft, generate, and peer-review. Critic and Gatekeeper enforce quality and compliance in-flight.',
                'col_c' => 'Architecture sign-off and promotion gates at designated pipeline stages.',
            ],
            [
                'col_a' => "High Autonomy\n\nContinuous Application and Infrastructure Support operations, low risk change classes.",
                'col_b' => 'Agents act within policy boundaries. Gatekeeper enforces. Humans review by exception and escalation.',
                'col_c' => 'Exception escalation thresholds and scheduled program digests.',
            ],
        ],
    ],

    /* ── 02 Policy Gates — uses synthetix_data_table ── */
    'policy_gates' => [
        'eyebrow'      => '02 / Policy Gates',
        'title'        => 'Your policies. Enforced on every change.',
        'intro'        => '<p>Your security and compliance function writes the policy. Gatekeeper enforces it on every change, every commit, every promotion without exception.</p><p>The Synthetix policy library defines what is permitted, what is blocked, and what requires escalation. Coverage spans security posture, regulatory compliance constraints, architectural conventions, code quality standards, license obligations, data residency requirements, and your organization\'s bespoke rules. Your teams write the rules. The platform enforces them uniformly.</p>',
        'col_a_header' => 'Policy Class',
        'col_b_header' => 'Examples',
        'col_c_header' => 'Default Action',
        'rows'         => [
            [
                'col_a' => 'Security',
                'col_b' => 'SAST and DAST findings, secrets detection, vulnerable dependency introduction.',
                'col_c' => 'Block at Gatekeeper. Auto-routed to the security team with full evidence.',
            ],
            [
                'col_a' => 'Compliance',
                'col_b' => 'HIPAA, PCI-DSS, SOX, GDPR data-handling, and retention obligations.',
                'col_c' => 'Block. Full audit trail generated with regulatory rule citation.',
            ],
            [
                'col_a' => 'Architecture',
                'col_b' => 'Service boundary violations, prohibited dependencies, deprecated API references.',
                'col_c' => 'Block. Compliant alternative surfaced by the Architect agent.',
            ],
            [
                'col_a' => 'Quality',
                'col_b' => 'Test coverage thresholds, code complexity limits, contract drift. Threshold-gated.',
                'col_c' => 'Routed to the Examiner agent for remediation.',
            ],
            [
                'col_a' => 'Operations',
                'col_b' => 'Change windows, blast-radius constraints, deployment velocity controls. Enforced against approved change windows.',
                'col_c' => 'Escalation workflow triggered on breach.',
            ],
        ],
    ],

    /* ── 03 Provenance & Audit — uses synthetix_data_table ── */
    'provenance' => [
        'eyebrow'      => '03 / Provenance & Audit',
        'title'        => 'Every decision. Signed. Traceable.',
        'intro'        => '<p>Confidence-scored evidence chains, signed decision trails, audit-ready output. From an agent\'s first action to your final production promotion.</p><p>Every artifact produced by Synthetix, whether a line of code, an architecture decision, or a requirement specification, is traceable to its complete evidence base. Which agent produced it. Which Atlas graph nodes informed it. What confidence score it carries. Who approved it. What it depended on. And when it shipped. That record does not exist solely for internal review. It is the basis of every regulator inquiry, every postmortem, and every change advisory board submission.</p>',
        'col_a_header' => 'Record',
        'col_b_header' => "What's Captured",
        'col_c_header' => 'Audit Use',
        'rows'         => [
            [
                'col_a' => 'Decision Trail',
                'col_b' => 'Every agent action: input state, output, confidence score, and downstream effect in sequence.',
                'col_c' => 'Internal assurance review. Regulatory inquiry. Incident postmortem.',
            ],
            [
                'col_a' => 'Evidence Chain',
                'col_b' => 'Atlas graph nodes referenced. Source code paths traversed. External signals consumed.',
                'col_c' => 'Explain any output back to its grounding data, step by step.',
            ],
            [
                'col_a' => 'Approval Graph',
                'col_b' => 'Who approved what change, when, with what contextual evidence, under which policy version.',
                'col_c' => 'SOX and ISO audit submissions. Change Advisory Board records.',
            ],
            [
                'col_a' => 'Reversibility Record',
                'col_b' => 'Wave checkpoints across every run. Rollback plan attached to every promotion.',
                'col_c' => 'Incident response. Failed migration recovery. Regulatory rollback obligation.',
            ],
        ],
    ],

    /* ── 04 Security & Compliance — uses synthetix_status_table ── */
    'security' => [
        'eyebrow' => '04 / Security & Compliance',
        'title'   => 'The certifications, controls, and audit posture that regulated industries require before any contract is signed.',
        'intro'   => '<p>Healthcare providers, financial institutions, insurance carriers, and public sector agencies operate under compliance obligations that are non-negotiable and non-deferrable. Every vendor evaluation begins with the same question: does your platform meet our regulatory requirements? Synthetix answers that question before it is asked. The certifications and security controls on this page are not items on a future roadmap. They are first-class engineering priorities, built into the platform from day one.</p>',
        'rows'    => [
            [ 'row_type' => 'group', 'group_label' => 'Certifications' ],
            [ 'row_type' => 'data',  'standard' => 'SOC 2 Type II', 'coverage' => 'Annual independent audit covering security, availability, processing integrity, confidentiality, and privacy.', 'status' => 'ACTIVE' ],
            [ 'row_type' => 'data',  'standard' => 'ISO 27001',     'coverage' => 'Information Security Management System certification. Expected Q3 2026.', 'status' => 'IN PROGRESS' ],
            [ 'row_type' => 'data',  'standard' => 'HIPAA',         'coverage' => 'BAA available. Compliance posture aligned with HIPAA Security and Privacy Rules.', 'status' => 'IN PROGRESS' ],
            [ 'row_type' => 'data',  'standard' => 'FedRAMP Moderate', 'coverage' => 'Authorization process initiated. Air-gapped deployment available for federal customers.', 'status' => 'ROADMAP' ],
            [ 'row_type' => 'data',  'standard' => 'GDPR',          'coverage' => 'EU data residency available. Data Processing Agreements in place. Right-to-erasure honored.', 'status' => 'ACTIVE' ],
            [ 'row_type' => 'group', 'group_label' => 'Security Controls' ],
            [ 'row_type' => 'data',  'standard' => 'Encryption',        'coverage' => 'AES-256 at rest. TLS 1.3 in transit. Customer-managed keys (BYOK) supported.', 'status' => 'ACTIVE' ],
            [ 'row_type' => 'data',  'standard' => 'Access Controls',   'coverage' => 'SSO via Okta, Microsoft Entra ID, and Ping Identity. SCIM provisioning. Role-based and attribute-based access controls.', 'status' => 'ACTIVE' ],
            [ 'row_type' => 'data',  'standard' => 'Penetration Testing', 'coverage' => 'Continuous independent third-party security assessment. Findings remediated and independently re-validated.', 'status' => 'ACTIVE' ],
        ],
    ],

    /* ── 05 Deployment Options — uses synthetix_deployment_grid ── */
    'deployment' => [
        'eyebrow' => '05 / Deployment Options',
        'title'   => 'Every deployment model your regulated environment demands, supported without compromise.',
        'intro'   => '<p>The right deployment model is determined by your regulatory obligations, your internal risk policy, and the sensitivity of the systems Synthetix will operate on. For organisations where cloud is the answer, multi-tenant SaaS is available across US, EU, and APAC regions with data residency pinning.</p><p>For those requiring dedicated infrastructure, single-tenant VPC deployment runs within your own AWS, Azure, or GCP account. For on-premises mandates, Synthetix deploys as a Kubernetes-native workload on your own infrastructure. For sovereign and classified environments, fully air-gapped operation is supported with updates delivered via signed and verified bundles.</p>',
        'cards'   => [
            [ 'card_label' => '— Default',   'card_name' => 'SaaS',              'card_desc' => 'Multi-tenant cloud. Fastest to start. Available in US, EU, and APAC regions. Region pinning for data residency.' ],
            [ 'card_label' => '— Isolated',  'card_name' => 'Single-tenant VPC', 'card_desc' => 'Dedicated VPC in your AWS, Azure, or GCP account. Customer-managed keys. No shared infrastructure.' ],
            [ 'card_label' => '— On-Prem',   'card_name' => 'Self-hosted',       'card_desc' => 'Run Synthetix on your own infrastructure — on-premises, VMware, or OpenShift. Kubernetes-native deployment.' ],
            [ 'card_label' => '— Regulated', 'card_name' => 'Air-gapped',        'card_desc' => 'Fully disconnected operation for sovereign, classified, and life-safety environments. Updates via signed and verified bundles.' ],
        ],
    ],

    'cta' => [
        'eyebrow'     => '— Begin',
        'heading'     => 'Bring your compliance team.',
        'cta_primary' => 'REQUEST A GOVERNANCE REVIEW',
    ],
];
