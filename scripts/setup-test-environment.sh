#!/bin/bash

# Visual Regression Testing Setup Script for Galactus Theme
# This script sets up the testing environment for UBC CLF theme testing with Playwright

set -e

echo "🚀 Setting up Visual Regression Testing Environment for Galactus Theme"
echo "=================================================================="
echo "Using Playwright + DDEV for testing"
echo ""

# Check if Node.js is installed
if ! command -v node &> /dev/null; then
    echo "❌ Node.js is not installed. Please install Node.js 18+ first."
    echo "   Visit: https://nodejs.org/"
    exit 1
fi

# Check Node.js version
NODE_VERSION=$(node --version | cut -d'v' -f2 | cut -d'.' -f1)
if [ "$NODE_VERSION" -lt 18 ]; then
    echo "❌ Node.js version 18+ is required. Current version: $(node --version)"
    exit 1
fi

echo "✅ Node.js $(node --version) detected"

# Check if npm is available
if ! command -v npm &> /dev/null; then
    echo "❌ npm is not installed. Please install npm first."
    exit 1
fi

echo "✅ npm $(npm --version) detected"

# Check if DDEV is available
if ! command -v ddev &> /dev/null; then
    echo "❌ DDEV is not installed. Please install DDEV first."
    echo "   Visit: https://ddev.readthedocs.io/en/stable/users/install/"
    exit 1
fi

echo "✅ DDEV $(ddev --version) detected"

# Install dependencies
echo "📦 Installing dependencies..."
npm install

# Install Playwright browsers
echo "🌐 Installing Playwright browsers..."
npx playwright install

# Create necessary directories
echo "📁 Creating test directories..."
mkdir -p tests
mkdir -p test-results
mkdir -p playwright-report

# Check if DDEV project is running
echo "🔍 Checking DDEV environment..."
if ddev status | grep -q "running"; then
    echo "✅ DDEV project is running"
    echo "   Site URL: $(ddev describe --json-output | jq -r '.raw.status_url')"
else
    echo "⚠️  DDEV project is not running"
    echo "   Starting DDEV project..."
    ddev start
    echo "✅ DDEV project started"
fi

# Update .gitignore entries for test artifacts
echo "📝 Updating .gitignore..."
if [ ! -f .gitignore ]; then
    touch .gitignore
fi

# Add test artifacts to .gitignore if not already present
if ! grep -q "test-results/" .gitignore; then
    echo "" >> .gitignore
    echo "# Visual Regression Testing" >> .gitignore
    echo "test-results/" >> .gitignore
    echo "playwright-report/" >> .gitignore
    echo "node_modules/" >> .gitignore
    echo "package-lock.json" >> .gitignore
fi

echo "✅ .gitignore updated"

# Display available commands
echo ""
echo "🎯 Setup Complete! Available commands:"
echo "====================================="
echo "npm run test:visual            - Run all visual regression tests"
echo "npm run test:visual:ui         - Run tests with Playwright UI"
echo "npm run test:visual:headed     - Run tests in headed mode"
echo "npm run test:visual:debug      - Run tests in debug mode"
echo "npm run test:visual:report     - Open test report in browser"
echo "npm run test:visual:clean      - Clean test artifacts"
echo ""

echo "💡 To get started:"
echo "   1. Ensure your DDEV project is running: ddev start"
echo "   2. Run tests: npm run test:visual"
echo "   3. View report: npm run test:visual:report"
echo ""
echo "   Or use the UI mode: npm run test:visual:ui"

echo ""
echo "📚 For more information, see the README-VISUAL-TESTING.md file"
echo "🎨 Happy testing with Playwright! 🎨"
