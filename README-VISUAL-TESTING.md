# Visual Regression Testing for Galactus Theme

This document describes the visual regression testing setup for the Galactus Drupal 10+ theme, which provides UBC CLF (Common Look and Feel) integration.

## Overview

Visual regression testing ensures that theme changes don't introduce unintended visual regressions across different screen sizes, browsers, and theme variations. The testing system uses Playwright to capture screenshots and compare them against baseline images.

## Features

- **Multi-viewport testing**: Mobile, tablet, desktop, and large desktop
- **Theme variation testing**: Default, dark, high contrast, and large text themes
- **UBC CLF specific testing**: Blue and grey color schemes
- **Component-focused testing**: Navigation, forms, content, footer, and more
- **DDEV integration**: Seamless local development environment
- **Comprehensive reporting**: HTML reports with visual diffs

## Prerequisites

- Node.js 18+ and npm
- DDEV (already configured for your project)
- Drupal 11 site running in DDEV

## Quick Start

### 1. Setup Environment

```bash
# Make the setup script executable
chmod +x scripts/setup-test-environment.sh

# Run the setup script
./scripts/setup-test-environment.sh
```

### 2. Start DDEV Manually

```bash
# Start your DDEV project
ddev start

# Or check status
ddev status
```

**Important**: DDEV must be running before you start the tests. The Playwright configuration expects DDEV to already be available.

### 3. Run Visual Regression Tests

```bash
# Run all tests
npm run test:visual

# Or run with UI for interactive testing
npm run test:visual:ui
```

## Available Commands

| Command | Description |
|---------|-------------|
| `npm run test:visual` | Run all visual regression tests |
| `npm run test:visual:ui` | Run tests with Playwright UI |
| `npm run test:visual:headed` | Run tests in headed mode |
| `npm run test:visual:debug` | Run tests in debug mode |
| `npm run test:visual:report` | Open test report in browser |
| `npm run test:visual:clean` | Clean test artifacts |

## Test Scenarios

The testing system covers the following scenarios:

### Core Pages
- **Homepage**: Default and dark theme variations
- **Content Pages**: Node display and content regions
- **Navigation**: Primary menu, mobile menu, breadcrumbs
- **Forms**: Search forms and form elements
- **Footer**: Complete footer and pre-footer regions

### Theme Variations
- **Color Schemes**: UBC CLF blue and grey variants
- **Accessibility**: High contrast and large text themes
- **Responsive**: Mobile, tablet, and desktop layouts

### UBC CLF Specific
- **CLF Integration**: Header, footer, and branding elements
- **Responsive Navigation**: Slide-in and sticky navigation
- **Drawer Components**: Off-canvas drawer functionality

## Configuration

### Playwright Configuration (`playwright.config.js`)

The main configuration file defines:
- **Base URL**: Points to your DDEV site (`https://galactus.ddev.site`)
- **Browsers**: Chrome, Firefox, Safari, and mobile browsers
- **Viewports**: Different screen sizes to test
- **Manual DDEV Management**: DDEV must be started manually before testing

### Test Structure (`tests/visual-regression.spec.js`)

The test file contains:
- **Test Groups**: Organized by component type
- **Screenshot Capture**: Automatic screenshot comparison
- **Theme Variations**: Dynamic theme switching for testing
- **Responsive Testing**: Different viewport sizes

## DDEV Integration

### Manual DDEV Management

**Important**: DDEV must be started manually before running tests:

```bash
# Start DDEV
ddev start

# Check status
ddev status

# View site URL
ddev describe
```

## Customizing Tests

### Adding New Test Scenarios

1. Edit `tests/visual-regression.spec.js`
2. Add new test cases within existing describe blocks
3. Use `await expect(page).toHaveScreenshot('filename.png')` for screenshots

### Modifying Viewports

```javascript
// In your test file
await page.setViewportSize({ width: 1440, height: 900 });
```

## Troubleshooting

### Common Issues

**Tests failing due to dynamic content**
- Use `page.waitForTimeout()` for animations
- Check for loading states with `page.waitForLoadState()`
- Use conditional selectors for optional elements

**Screenshots not matching across runs**
- Ensure DDEV site is in consistent state
- Check for animations or transitions
- Verify theme settings are consistent

**"Process from config.webServer exited early" error**
- This error occurs when the webServer configuration conflicts with DDEV
- Solution: Start DDEV manually with `ddev start` before running tests
- The webServer configuration has been removed to prevent this issue

### Debug Mode

```bash
# Run tests in debug mode
npm run test:visual:debug

# Or use UI mode for step-by-step debugging
npm run test:visual:ui
```

## Best Practices

### Development Workflow

1. **Before making changes**: Run `npm run test:visual` to establish baseline
2. **After changes**: Run `npm run test:visual` to check for regressions
3. **Review failures**: Use `npm run test:visual:report` to view results
4. **Debug issues**: Use `npm run test:visual:ui` for interactive debugging

### Maintaining Tests

- Update tests when adding new theme features
- Add screenshots for new components
- Test across different viewport sizes
- Verify theme variations work correctly

### Performance

- Run tests during development, not production
- Use `npm run test:visual:clean` to remove old artifacts
- Focus on critical components first
- Use conditional testing for optional elements

## File Structure

```
galactus/
├── playwright.config.js          # Playwright configuration
├── package.json                  # Dependencies and scripts
├── tests/
│   ├── visual-regression.spec.js # Main test file
├── scripts/
│   └── setup-test-environment.sh # DDEV-aware setup
├── test-results/                 # Test artifacts (gitignored)
├── playwright-report/            # HTML test reports (gitignored)
└── README-VISUAL-TESTING.md      # This file
```

## Support

For issues or questions about visual regression testing:

1. Check the troubleshooting section above
2. Review Playwright documentation: https://playwright.dev/
3. Check DDEV status and logs
4. Use debug mode for step-by-step investigation

## Contributing

When contributing to the visual testing system:

1. Follow existing test patterns
2. Add tests for new theme features
3. Update documentation for new functionality
4. Ensure tests pass before committing

---

**Note**: This testing system is designed specifically for the Galactus theme and UBC CLF integration, using Playwright and DDEV for a streamlined development experience. Remember to start DDEV manually before running tests.
