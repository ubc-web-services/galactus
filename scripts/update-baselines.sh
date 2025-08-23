#!/bin/bash

# Update Baseline Screenshots Script
# This script helps you update baseline screenshots after the first test run

echo "🔄 Updating Baseline Screenshots for Visual Regression Tests"
echo "=========================================================="
echo ""

# Check if test results exist
if [ ! -d "test-results" ]; then
    echo "❌ No test results found. Run tests first with: npm run test:visual"
    exit 1
fi

echo "📊 Found test results directory"
echo ""

# Create snapshots directory if it doesn't exist
mkdir -p tests/visual-regression.spec.js-snapshots

echo "📁 Copying actual screenshots to baseline snapshots..."
echo ""

# Find all actual screenshots and copy them to snapshots
find test-results -name "*actual.png" -type f | while read -r file; do
    # Extract the test name from the file path
    filename=$(basename "$file" "-actual.png")
    
    # Copy to snapshots directory
    cp "$file" "tests/visual-regression.spec.js-snapshots/${filename}.png"
    echo "✅ Copied: $filename"
done

echo ""
echo "🎯 Baseline screenshots updated!"
echo ""
echo "💡 Next steps:"
echo "   1. Review the baseline screenshots in tests/visual-regression.spec.js-snapshots/"
echo "   2. Run tests again: npm run test:visual"
echo "   3. Tests should now pass (unless there are actual visual changes)"
echo ""
echo "📚 To view test reports: npm run test:visual:report"
echo "🧹 To clean up test artifacts: npm run test:visual:clean"
