# Attributions

This directory contains skills converted from external repositories. Each is reproduced here in zero-dependency Markdown format with Claude Code runtime plumbing removed.

---

| Repository | License | Source URL |
|---|---|---|
| `obra/superpowers` | MIT | https://github.com/obra/superpowers |
| `anthropics/skills` (skill-creator only) | Apache-2.0 | https://github.com/anthropics/skills |
| `JuliusBrussee/caveman` | MIT | https://github.com/JuliusBrussee/caveman |
| `anthropics/claude-code-security-review` | Apache-2.0 | https://github.com/anthropics/claude-code-security-review |
| `Graphify-Labs/graphify` | MIT | https://github.com/Graphify-Labs/graphify |
| `nextlevelbuilder/ui-ux-pro-max-skill` | MIT | https://github.com/nextlevelbuilder/ui-ux-pro-max-skill |
| `mattpocock/skills` | MIT | https://github.com/mattpocock/skills |

## Notes

- **obra/superpowers**: All 14 skills converted. Source frontmatter preserved where applicable.
- **anthropics/skills (skill-creator)**: Only `skill-creator` folder converted per scope. Other skills in this repo (algorithmic-art, brand-guidelines, canvas-design, etc.) were excluded as they are either unrelated to the task or have overlapping alternatives in scope.
- **JuliusBrussee/caveman**: All 7 skills converted. Original skill names preserved.
- **anthropics/claude-code-security-review**: Source was a `.claude/commands/security-review.md` command file, not a skill directory. Methodology content converted to skill format. Git command substitution blocks (`!`git ...`) were stripped as Claude Code runtime plumbing.
- **Graphify-Labs/graphify**: No skills directory existed in source. Skill was authored from README.md and ARCHITECTURE.md documentation describing the dependency graph generation methodology.
- **nextlevelbuilder/ui-ux-pro-max-skill**: All 7 skills from `.claude/skills/` converted. Additional assets (data/, references/, scripts/ directories) were excluded as they are not needed for the zero-dependency Markdown format.
- **mattpocock/skills**: 25 skills converted from engineering, productivity, and misc categories. Deprecated and in-progress skills were excluded per original repository classification. Personal skills (edit-article, obsidian-vault) and setup-matt-pocock-skills were excluded as workspace-specific or install plumbing.

## Overlap Resolution — Removed Skills

The following overlapping skills were evaluated and the inferior one was removed. Reasoning:

| Removed | Kept | Rationale |
|---|---|---|
| `superpowers-requesting-code-review` | `mattpocock-code-review` | mattpocock's is far more thorough — two-axis review (Standards + Spec), parallel sub-agents, smell baseline (Fowler code smells), spec source discovery. Superpowers version is a thin subagent dispatch wrapper. |
| `superpowers-systematic-debugging` | `mattpocock-diagnosing-bugs` | mattpocock's is a 6-phase, 134-line discipline with feedback-loop construction, minimization, hypothesis ranking, and tagged instrumentation. Superpowers version is shorter and less structured. |
| `superpowers-writing-skills` | `skill-creator-create-skills` | skill-creator (anthropics official) is the authoritative source — 28k chars, covers eval, agents, testing, references. Kept `mattpocock-writing-great-skills` alongside it as complementary (different focus: best practices vs creation mechanics). |
| `mattpocock-grill-me` | `mattpocock-grilling` | grill-me was a 6-line forwarder that just says "Run a /grilling session". Direct use of grilling is more efficient. |
| `mattpocock-tdd` | `superpowers-test-driven-development` | superpowers TDD is 371 lines of comprehensive methodology vs mattpocock's 36-line reference (which itself references external files). Superpowers version is self-contained, more detailed, and covers rationalizations/anti-patterns/debugging integration. |

**Retained as-is (no overlap removed):**
- `superpowers-receiving-code-review` and `caveman-caveman-review` — different purposes: one is feedback processing, the other is compressed review style
- `ui-ux-pro-max-ui-ux-pro-max` and `ui-ux-pro-max-design` — different purposes: one is priority-based rule database, the other is general design methodology
- `skill-creator-create-skills` and `mattpocock-writing-great-skills` — different focus: creation mechanics vs best practices
