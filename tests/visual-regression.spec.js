const { test, expect } = require('@playwright/test');

test.describe('Galactus Theme - Essential Visual Tests', () => {
  test.beforeEach(async ({ page }) => {
    await page.waitForLoadState('networkidle');
  });

  test('homepage - default theme', async ({ page }) => {
    await page.goto('/');
    await page.waitForTimeout(1000);
    await expect(page).toHaveScreenshot('homepage-default.png');
  });

  test('homepage - mobile view', async ({ page }) => {
    await page.setViewportSize({ width: 375, height: 667 });
    await page.goto('/');
    await page.waitForTimeout(1000);
    await expect(page).toHaveScreenshot('homepage-mobile.png');
  });

  test('homepage - desktop view', async ({ page }) => {
    await page.setViewportSize({ width: 1200, height: 800 });
    await page.goto('/');
    await page.waitForTimeout(1000);
    await expect(page).toHaveScreenshot('homepage-desktop.png');
  });

  test('content - main area', async ({ page }) => {
    await page.goto('/');
    const content = page.locator('#main-content');
    if (await content.isVisible()) {
      await expect(content).toHaveScreenshot('main-content.png');
    }
  });

  test('footer', async ({ page }) => {
    await page.goto('/');
    await page.evaluate(() => window.scrollTo(0, document.body.scrollHeight));
    await page.waitForTimeout(500);
    
    const footer = page.locator('footer, .region-footer');
    if (await footer.isVisible()) {
      await expect(footer).toHaveScreenshot('footer.png');
    }
  });
});
