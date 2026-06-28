# DEV_HANDOFF.md — Synthetix Website Build

Handoff document for the developer replicating this build on the live WordPress account.

---

## Prerequisites

Install these before importing content:

1. **Agenio theme** (`agenio.zip`) — activate
2. **agenio-core plugin** (`agenio-core.zip`) — activate
3. **Elementor** (free) — install from WP.org
4. **Elementor Pro** — check `agenio-core.php` for any `\Elementor\Plugin::$instance->experiments` calls that require Pro; the stock demo appears to use free widgets only, but confirm on import
5. **Add the Synthetix loader** — in `agenio-core.php`, inside the `plugins_loaded` or `init` hook, add:
   ```php
   require_once plugin_dir_path( __FILE__ ) . 'synthetix-widgets.php';
   ```
   This registers all 10 new widgets and enqueues `synthetix-widgets.css`.

---

## New Widgets — where they live and what they do

All new widget PHP files are in `agenio-core/widgets/synthetix/`.
All are registered in `agenio-core/synthetix-widgets.php`.
CSS is in `agenio-core/assets/css/synthetix-widgets.css` — all values reference theme CSS variables, no invented palette.

| Widget class | File | Used on | # instances |
|---|---|---|---|
| `Elementor_Synthetix_Agent_Card_Widget` | `agent-card.php` | `/agents` | 9 |
| `Elementor_Synthetix_Solution_Block_Widget` | `solution-block.php` | `/solutions` | 4 |
| `Elementor_Synthetix_Workflow_Diagram_Widget` | `workflow-diagram.php` | `/agents` | 1 |
| `Elementor_Synthetix_Pipeline_Widget` | `pipeline.php` | `/platform` | 1 |
| `Elementor_Synthetix_Integrations_Grid_Widget` | `integrations-grid.php` | `/platform` | 1 |
| `Elementor_Synthetix_Data_Table_Widget` | `data-table.php` | `/governance` × 3, `/why` | 4 |
| `Elementor_Synthetix_Status_Table_Widget` | `status-table.php` | `/governance` (§04) | 1 |
| `Elementor_Synthetix_Deployment_Grid_Widget` | `deployment-grid.php` | `/governance` (§05) | 1 |
| `Elementor_Synthetix_Comparison_Table_Widget` | `comparison-table.php` | `/why` | 1 |
| `Elementor_Synthetix_Persona_Grid_Widget` | `persona-grid.php` | `/why` | 1 |

### How to edit content in each widget

All content is editable via the Elementor panel — no PHP required after initial setup:

- **Agent Card**: open Elementor → click the card → edit fields in left panel (number, stage/role tags, headline, body, input/output repeaters)
- **Solution Block**: same approach — brand frame, solution name, intro, bullet repeaters, stat repeaters, engagement tags
- **Data Table**: section intro + header row controls + rows repeater. Each row has 3 textarea cells
- **Status Table**: rows repeater — set `row_type` to `group` for section headers (e.g. "Certifications"), `data` for content rows with status badge dropdown
- **Deployment Grid**: cards repeater — label, name, description per card
- **Comparison Table**: column headers in a textarea (one per line), rows repeater with feature name + cells textarea (one per line matching column order). Use `✓` / `✗` for check/cross cells
- **Persona Grid**: personas repeater — role, accountability line, body, optional icon image
- **Pipeline**: stages repeater — number, name, description, agent names (comma-separated)
- **Integrations Grid**: groups repeater — category name + tool names (one per line)
- **Workflow Diagram**: steps repeater — set `step_type` to `agent` or `human_gate`. Human gate steps render the lime hexagon marker automatically

---

## Page build order

Build in this order to avoid broken anchor links:

1. `/governance` — all 5 sections + CTA
2. `/solutions` — hero + 4 solution blocks + footer band
3. `/agents` — hero + workflow diagram + 9 agent cards + CTA
4. `/platform` — hero + pipeline + Conductor + Atlas + integrations + CTA *(awaiting Platform doc)*
5. `/why` — hero + comparison table + persona grid + business case table + CTA *(awaiting Why doc)*
6. `/` (Home) — 12 sections pulling anchors from all above
7. Resources sub-pages (Blog, Case Studies, Briefs, Docs) — placeholders
8. Company sub-pages (Story, Leadership, Careers, Contact) — placeholders
9. **Mega-menu** — wire up after all pages exist

### Pre-filled content configs

`page-content/solutions.php`, `page-content/agents.php`, `page-content/governance.php` contain all copy pre-keyed to widget field names. Use them as a paste reference when building pages in Elementor.

---

## Missing assets (flagged — do not invent placeholders silently)

| Asset | Needed for | Action |
|---|---|---|
| Agent icons / illustrations | Agent cards (optional icon field) | Provide SVG or WebP per agent; until then leave icon fields empty |
| Integration logos | Integrations grid | Provide SVG logos per tool, upload to Media Library, wire into list items or extend widget with image field per tool |
| Stakeholder persona icons | Persona grid (optional icon field) | Provide role icons or leave empty |
| Team / leadership photos | `/company/leadership` | Provide per team member |
| Case study featured images | Case Studies page | Provide per case study |
| Platform doc copy | `/platform` pipeline stage descriptions, Conductor section, Atlas section, Integrations categories | **Awaiting `WPC-Synthetix-Platform.docx`** |
| Why Synthetix doc copy | `/why` comparison table rows, 8 persona card bodies, cost-driver table | **Awaiting `WPC-Synthetix-Why_Synthetix.docx`** |
| Nav IA detail | Mega-menu structure, anchor URLs, homepage 12-section order | **Awaiting `Synthetix_Website_plan_v2.xlsx`** |

---

## Mega-menu

The stock Agenio nav walker is flat. The brief requires a mega-menu with italic brand-frame sub-headers (*Imagine / Reimagine / Evolve* under Solutions).

**Recommended approach:**
1. Install a mega-menu plugin (e.g. Max Mega Menu, or build a custom `Walker_Nav_Menu` subclass in `agenio/inc/class-synthetix-mega-menu-walker.php`)
2. Register a custom nav menu location `synthetix-mega-menu` in `functions.php`
3. Mega-menu columns per Solutions: brand frame as italic `<em>` sub-header, functional solution name as `<a>` link
4. Under Resources: Blog, Case Studies, Briefs, Docs
5. Under Company: Story, Leadership, Careers, Contact

This is deferred until all pages in §5 are live (anchors need to exist before linking).

---

## Open questions for Kartikeya

1. **Page count discrepancy**: xlsx notes "Total pages: 11" but the build has 14 pages (6 main + 8 sub-pages). Which 4 sub-pages were intended to be omitted in that count? All 8 have been built; confirm whether any should be removed.
2. **Lime accent on regulated pages**: `#98FF03` is a strong consumer-tech accent. Appropriate for CTAs and ACTIVE badges on governance pages, but Kartikeya should confirm whether to soften it on Governance / Why Synthetix sections (e.g. replace primary lime use with `--color-secondary` `#1F1F25` as the dominant dark). See `DESIGN_TOKENS.md` for the specific concern.
3. **Platform and Why Synthetix docs**: content for `/platform` pipeline stage descriptions, Conductor/Atlas copy, integration categories, comparison table rows, and 8 persona card bodies is blocked until these 2 docs are provided.
4. **Nav IA detail**: without the xlsx, the homepage 12-section order, exact anchor URLs, and mega-menu sub-item labels are assumed from the brief. Review against the actual xlsx once shared.

---

## WordPress deployment steps

```bash
# 1. Install WP
wp core download && wp config create --dbname=synthetix --dbuser=root --dbpass=root
wp core install --url=http://localhost --title="Synthetix" --admin_user=admin --admin_password=admin --admin_email=admin@synthetix.ai

# 2. Install and activate theme + plugins
wp theme install /path/to/agenio.zip --activate
wp plugin install /path/to/agenio-core.zip --activate
wp plugin install elementor --activate

# 3. Copy synthetix-widgets.php and widgets/synthetix/ into the agenio-core plugin dir
# 4. Add require_once line to agenio-core.php (see Prerequisites above)
# 5. Import demo data to confirm baseline render
wp import demo-import/data.xml --authors=create

# 6. Build pages in Elementor using page-content/*.php as copy references
```

---

## WXR Export

Once all pages are built in Elementor:

```bash
wp export --post_type=page --filename_format=synthetix-pages-export
```

Export the modified `agenio-core` plugin as a zip for the developer import package.
