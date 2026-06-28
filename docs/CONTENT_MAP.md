# CONTENT_MAP.md — Synthetix Website Build

Single source of truth mapping every page → section → source → widget → verdict → status.

**Status key:** `[ ]` = not started · `[~]` = in progress · `[x]` = complete

---

## Open Issues (flag to Kartikeya before finalising)

1. **Page-count discrepancy:** The xlsx notes "Total pages: 11" but Resources (Blog, Case Studies, Briefs, Docs = 4) + Company (Story, Leadership, Careers, Contact = 4) = 8 sub-pages, plus 6 main nav pages = 14 total. All 14 are being built; clarify which 4 were meant to be omitted in the original count.
2. **Lime accent suitability:** See DESIGN_TOKENS.md. Await Kartikeya's call.
3. **Missing source files (as of build start):** `WPC-Synthetix-Platform.docx`, `WPC-Synthetix-Why_Synthetix.docx`, `Synthetix_Website_plan_v2.xlsx` — sections mapped from brief only; will update once files are provided.
4. **Visual assets not in source docs:** Agent icons, integration logos, stakeholder persona photos — all marked `[PLACEHOLDER]` in components. Developer to supply.

---

## Global

| Element | Source | Widget | Verdict | Status |
|---|---|---|---|---|
| Header / nav | Brief §3; xlsx nav tree | `header` widget + custom mega-menu walker | Build new mega-menu | `[ ]` |
| Footer | Theme demo | `footer` widget | Reuse with Synthetix copy | `[ ]` |

---

## Home (`/`)

*12-section single-page tour per xlsx Sheet 2. Full copy TBD once xlsx received.*

| # | Section | Source | Widget | Verdict | Status |
|---|---|---|---|---|---|
| 1 | Hero | xlsx S2 row 1 | `hero` | Reuse | `[ ]` |
| 2 | Platform overview / pipeline teaser | xlsx S2 row 2 | `process` (adapted) or new pipeline | Adapt | `[ ]` |
| 3 | Solutions 4-block teaser | xlsx S2 row 3 | `service` (adapted) | Adapt | `[ ]` |
| 4 | Agents teaser / marquee | xlsx S2 row 4 | `marquee` + new agent-card | Adapt | `[ ]` |
| 5 | Governance teaser | xlsx S2 row 5 | `choose` / `choose-point` | Reuse | `[ ]` |
| 6 | Why Synthetix teaser | xlsx S2 row 6 | `about` | Reuse | `[ ]` |
| 7 | Integrations strip | xlsx S2 row 7 | `trusted` / new integrations grid | Adapt | `[ ]` |
| 8 | Proof / stats band | xlsx S2 row 8 | `awards` | Reuse | `[ ]` |
| 9 | Testimonials | xlsx S2 row 9 | `testimonial` | Reuse | `[ ]` |
| 10 | Case study / work teasers | xlsx S2 row 10 | `project` | Reuse | `[ ]` |
| 11 | Blog teasers | xlsx S2 row 11 | Native WP query block | Reuse | `[ ]` |
| 12 | CTA band | xlsx S2 row 12 | `cta` | Reuse | `[ ]` |

---

## Solutions (`/solutions`)

Source: `WPC-Synthetix-Solutions.docx`

| # | Section | Copy source | Widget | Verdict | Status |
|---|---|---|---|---|---|
| Hero | "One Platform. Four Enterprise Outcomes." | Solutions doc ¶1–3 | `hero` | Reuse | `[ ]` |
| 1 | Greenfield — *Imagine* | Solutions doc ¶4–14 | New `synthetix-solution-block` | Build new (extends service) | `[ ]` |
| 2 | Code Modernization — *Reimagine* | Solutions doc ¶15–25 | `synthetix-solution-block` | Same widget, 2nd instance | `[ ]` |
| 3 | Application Support — *Evolve (Applications)* | Solutions doc ¶26–37 | `synthetix-solution-block` | Same widget, 3rd instance | `[ ]` |
| 4 | Infrastructure Support — *Evolve (Infrastructure)* | Solutions doc ¶38–49 | `synthetix-solution-block` | Same widget, 4th instance | `[ ]` |
| Footer band | "The platform behind every solution" | Solutions doc ¶50–51 | `cta` (adapted) | Reuse | `[ ]` |

**Solution block fields needed (new widget):**
- Brand frame (italic eyebrow): *Imagine / Reimagine / Evolve*
- Solution name (H2)
- Intro paragraph
- "What agents do" repeater (bullet list)
- "Outcomes" repeater (stat + label)
- For: (text)
- Agents engaged: (comma-separated tags)
- Typical engagement: (text)

---

## Platform (`/platform`)

Source: `WPC-Synthetix-Platform.docx` — **FILE NOT YET RECEIVED**

| # | Section | Widget | Verdict | Status |
|---|---|---|---|---|
| Hero | Platform hero | `hero` | Reuse | `[ ]` |
| Pipeline | 6-stage Discover→Govern with agent tags | New `synthetix-pipeline` | Build new | `[ ]` |
| Conductor | 2 feature lists | `choose` / `choose-point` | Reuse | `[ ]` |
| Atlas | 2 feature lists | `choose` / `choose-point` | Reuse | `[ ]` |
| Integrations | 8 categories × tool lists | New `synthetix-integrations-grid` | Build new | `[ ]` |
| CTA | | `cta` | Reuse | `[ ]` |

---

## Agents (`/agents`)

Source: `WPC-Synthetix-Agents.docx`

| # | Section | Copy source | Widget | Verdict | Status |
|---|---|---|---|---|---|
| Hero | "Agent Workforce / A workforce built for enterprise scale." | Agents doc HERO | `hero` | Reuse | `[ ]` |
| Workflow band | 7-handoff / 2-gate diagram | Agents doc WORKFLOW BAND | New `synthetix-workflow-diagram` | Build new | `[ ]` |
| 01 Cartographer | Stage: Discover, Analyze / Role: Comprehension | Agents doc 01 | New `synthetix-agent-card` | Build new | `[ ]` |
| 02 Architect | Stage: Architect / Role: Strategy | Agents doc 02 | `synthetix-agent-card` | Same widget | `[ ]` |
| 03 Estimator | Stage: Architect / Role: Forecasting | Agents doc 03 | `synthetix-agent-card` | Same widget | `[ ]` |
| 04 Critic | Stage: All stages / Role: Quality | Agents doc 04 | `synthetix-agent-card` | Same widget | `[ ]` |
| 05 Conductor | Stage: Build, all stages / Role: Orchestration | Agents doc 05 | `synthetix-agent-card` | Same widget | `[ ]` |
| 06 Examiner | Stage: Verify / Role: Verification | Agents doc 06 | `synthetix-agent-card` | Same widget | `[ ]` |
| 07 Gatekeeper | Stage: Govern / Role: Governance | Agents doc 07 | `synthetix-agent-card` | Same widget | `[ ]` |
| 08 Scout | Stage: Discover, cross-cutting / Role: Intelligence | Agents doc 08 | `synthetix-agent-card` | Same widget | `[ ]` |
| 09 Mentor | Stage: Cross-cutting, Evolve / Role: Guidance | Agents doc 09 | `synthetix-agent-card` | Same widget | `[ ]` |
| CTA | "See the workforce in a live program." | Agents doc CTA | `cta` | Reuse | `[ ]` |

**Agent card fields (new widget):**
- Number (01–09)
- Stage tag
- Role tag
- Headline (H3)
- Body paragraph
- Inputs repeater (3 bullets)
- Outputs repeater (3 bullets)

---

## Governance (`/governance`)

Source: `WPC-Synthetix-Governance.docx`

| # | Section | Copy source | Widget | Verdict | Status |
|---|---|---|---|---|---|
| Hero | Eyebrow: Governance / H1 | Gov doc HERO | `hero` | Reuse | `[ ]` |
| 01 HITL | "Configure exactly where human judgment takes over." + 3-row autonomy matrix table | Gov doc 01 | New `synthetix-data-table` | Build new | `[ ]` |
| 02 Policy Gates | "Your policies. Enforced on every change." + 5-row policy class table | Gov doc 02 | `synthetix-data-table` | Reuse new widget | `[ ]` |
| 03 Provenance & Audit | "Every decision. Signed. Traceable." + 4-row audit record table | Gov doc 03 | `synthetix-data-table` | Reuse new widget | `[ ]` |
| 04 Security & Compliance | "The certifications, controls..." + status-badge table (ACTIVE/IN PROGRESS/ROADMAP) | Gov doc 04 | New `synthetix-status-table` | Build new (needs badge cells) | `[ ]` |
| 05 Deployment Options | "Every deployment model..." + 4-card deployment grid | Gov doc 05 | New `synthetix-deployment-grid` | Build new | `[ ]` |
| CTA banner | "Bring your compliance team." | Gov doc CTA | `cta` | Reuse | `[ ]` |

---

## Why Synthetix (`/why`)

Source: `WPC-Synthetix-Why_Synthetix.docx` — **FILE NOT YET RECEIVED**

| # | Section | Widget | Verdict | Status |
|---|---|---|---|---|
| Hero | | `hero` | Reuse | `[ ]` |
| vs-Competitors | Comparison table (Synthetix vs Copilots/Frameworks/Autonomous Coders) | New `synthetix-comparison-table` | Build new | `[ ]` |
| Stakeholder Value | 8 persona cards (CIO/CTO, Enterprise Architect, CISO, CFO, PMO, Engineering Leadership, Security Ops + 1 more) | New `synthetix-persona-grid` | Build new | `[ ]` |
| Business Case | Cost-driver table + proof-run copy | `synthetix-data-table` | Reuse new widget | `[ ]` |
| CTA | | `cta` | Reuse | `[ ]` |

---

## Resources — Blog (`/resources/blog`)

Placeholder page. Standard WP blog archive using theme's archive template.

| Element | Widget | Verdict | Status |
|---|---|---|---|
| Archive header | `hero` (minimal) | Reuse | `[ ]` |
| Post grid | Native WP archive | Reuse theme template | `[ ]` |

---

## Resources — Case Studies (`/resources/case-studies`)

Placeholder page. Uses `project` / `work` widget from theme.

| Element | Widget | Verdict | Status |
|---|---|---|---|
| Section header | `hero` (minimal) | Reuse | `[ ]` |
| Case study grid | `work` widget | Reuse | `[ ]` |

---

## Resources — Briefs (`/resources/briefs`)

Placeholder page (v1-minimal per change log).

| Element | Widget | Verdict | Status |
|---|---|---|---|
| Page | Static Elementor page with placeholder copy | `hero` + text block | Reuse | `[ ]` |

---

## Resources — Docs (`/resources/docs`)

Placeholder page (v1-minimal per change log).

| Element | Widget | Verdict | Status |
|---|---|---|---|
| Page | Static Elementor page with placeholder copy | `hero` + text block | Reuse | `[ ]` |

---

## Company — Story (`/company/story`)

Placeholder page.

| Element | Widget | Verdict | Status |
|---|---|---|---|
| Hero | `hero` | Reuse | `[ ]` |
| About section | `about` | Reuse | `[ ]` |

---

## Company — Leadership (`/company/leadership`)

Placeholder page.

| Element | Widget | Verdict | Status |
|---|---|---|---|
| Hero | `hero` | Reuse | `[ ]` |
| Team grid | `team` | Reuse | `[ ]` |

---

## Company — Careers (`/company/careers`)

Placeholder page (v1-minimal).

| Element | Widget | Verdict | Status |
|---|---|---|---|
| Page | `hero` + placeholder copy | Reuse | `[ ]` |

---

## Company — Contact (`/company/contact`)

| Element | Widget | Verdict | Status |
|---|---|---|---|
| Hero | `hero` | Reuse | `[ ]` |
| Contact form | `contactform` | Reuse | `[ ]` |

---

## New Components Summary

| Component (PHP class) | File | Used on | Repeats |
|---|---|---|---|
| `synthetix-solution-block` | `widgets/synthetix/solution-block.php` | Solutions | 4× |
| `synthetix-agent-card` | `widgets/synthetix/agent-card.php` | Agents | 9× |
| `synthetix-workflow-diagram` | `widgets/synthetix/workflow-diagram.php` | Agents | 1× |
| `synthetix-pipeline` | `widgets/synthetix/pipeline.php` | Platform | 1× |
| `synthetix-integrations-grid` | `widgets/synthetix/integrations-grid.php` | Platform | 1× |
| `synthetix-data-table` | `widgets/synthetix/data-table.php` | Gov 01/02/03, Why Business Case | 4× |
| `synthetix-status-table` | `widgets/synthetix/status-table.php` | Gov 04 | 1× |
| `synthetix-deployment-grid` | `widgets/synthetix/deployment-grid.php` | Gov 05 | 1× |
| `synthetix-comparison-table` | `widgets/synthetix/comparison-table.php` | Why Synthetix | 1× |
| `synthetix-persona-grid` | `widgets/synthetix/persona-grid.php` | Why Synthetix | 1× |
| Mega-menu nav walker | `inc/class-synthetix-mega-menu-walker.php` (in theme) | Global header | 1× |
