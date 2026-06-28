# DESIGN_TOKENS.md — Synthetix Build

Extracted verbatim from `agenio/assets/css/style.css :root`. All new components MUST use these variables only.

## Colour

| Variable | Value | Role |
|---|---|---|
| `--color-primary` | `#98FF03` | Lime accent — CTA buttons, active badges, highlights |
| `--color-secondary` | `#1F1F25` | Dark brand navy |
| `--color-black` | `#000000` | True black |
| `--color-heading-1` | `#030712` | Default heading colour |
| `--color-body-1` | `#6B7280` | Body / paragraph text |
| `--color-body-dark` | `#9A9A9A` | Body on dark backgrounds |
| `--color-title` | `#26262C` | Alternate heading |
| `--color-bg-1` | `#F3F4F6` | Light grey section bg |
| `--color-bg-2` | `#FFD7B7` | Warm peach bg |
| `--color-bg-3` | `#DAF2FF` | Light blue bg |
| `--color-bg-4` | `#89D6FF` | Sky blue bg |
| `--color-bg-5` | `#FFF5EE` | Cream bg |
| `--color-bg-dark` | `#181818` | Dark section bg |
| `--color-bg-dark-2` | `#0B0B0B` | Deepest dark bg |
| `--color-border` | `rgba(3,7,18,0.1)` | Default border |
| `--color-border-dark` | `#2C2C2C` | Border on dark bg |
| `--color-white` | `#fff` | White |
| `--color-success` | `#26CF4B` | ACTIVE badge |
| `--color-warning` | `#FF8F3C` | IN PROGRESS badge |
| `--color-info` | `#1BA2DB` | ROADMAP badge |
| `--color-danger` | `#FF0003` | Error / block states |

## Typography

| Variable | Value |
|---|---|
| `--font-primary` | `"Space Grotesk", sans-serif` — headings |
| `--font-secondary` | `"Urbanist", sans-serif` — body |
| `--h1` | `100px` |
| `--h2` | `64px` |
| `--h3` | `48px` |
| `--h4` | `40px` |
| `--h5` | `30px` |
| `--h6` | `24px` |
| `--font-size-b1` | `16px` |
| `--font-size-b3` | `22px` (large body) |
| `--line-height-b1` | `1.5` |

## Open Design Decision — Lime Accent on Regulated Enterprise Pages

**Flag for Kartikeya:** `#98FF03` (lime) is a bold consumer-tech accent. Synthetix targets regulated enterprise audiences (financial services, healthcare, insurance, government). The lime works for CTA buttons and status highlights, but applying it liberally across governance/compliance pages may undercut perceived gravitas.

**Recommendation:** Use lime exclusively for CTAs, ACTIVE status badges, and hover states. Use `--color-secondary` (`#1F1F25`) as the dominant dark on Governance and Why Synthetix pages. **Do not soften or substitute the lime without explicit sign-off from Kartikeya.**

## Weight Scale

`--p-light: 300` → `--p-black: 900` (prefixed `--p-` for primary font, `--s-` for secondary)

## Animation

`--transition: all 0.6s`
