# HTML Page with Items Carousel - Support for RTL and LTR

## Objective

The objective of this project is to enhance the HTML webpage featuring an interactive items carousel to support both RTL (Right-to-Left) and LTR (Left-to-Right) languages. The carousel should seamlessly adapt its layout and navigation controls based on the language direction, providing a consistent user experience for users in different language contexts.

## Requirements

1. Extend the existing HTML structure with a `<lang>` attribute in the `<html>` tag to specify the language direction (e.g., `lang="ar"` for Arabic or `lang="en"` for English).
2. Modify the carousel's CSS and JavaScript to dynamically adjust the layout and navigation controls based on the language direction.
3. Ensure that the carousel's movement and transition animations align with the appropriate language direction.
4. Test the carousel's functionality and appearance in both RTL and LTR modes to verify that it adapts correctly to different language directions.
5. Consider any additional adjustments to the design, layout, or behavior of the carousel that may be necessary to ensure a seamless experience in RTL and LTR languages.
6. Use CSS or Tailwind for styling, but not Bootstrap. Use JavaScript only, no other frameworks are allowed.
7. If you choose to use online code, ensure that you maintain the features you added and provide the source code for reference.

## Implementation

### HTML Structure

The HTML structure should contain a `<lang>` attribute in the `<html>` tag to specify the language direction:

```html
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Head content -->
</head>
<body>
  <!-- Carousel container and item elements -->
</body>
</html>