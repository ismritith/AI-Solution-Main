---
name: Aether AI
colors:
  surface: '#0b1326'
  surface-dim: '#0b1326'
  surface-bright: '#31394d'
  surface-container-lowest: '#060e20'
  surface-container-low: '#131b2e'
  surface-container: '#171f33'
  surface-container-high: '#222a3d'
  surface-container-highest: '#2d3449'
  on-surface: '#dae2fd'
  on-surface-variant: '#ccc3d8'
  inverse-surface: '#dae2fd'
  inverse-on-surface: '#283044'
  outline: '#958da1'
  outline-variant: '#4a4455'
  surface-tint: '#d2bbff'
  primary: '#d2bbff'
  on-primary: '#3f008e'
  primary-container: '#7c3aed'
  on-primary-container: '#ede0ff'
  inverse-primary: '#732ee4'
  secondary: '#4cd7f6'
  on-secondary: '#003640'
  secondary-container: '#03b5d3'
  on-secondary-container: '#00424e'
  tertiary: '#ffafd3'
  on-tertiary: '#620040'
  tertiary-container: '#ae397b'
  on-tertiary-container: '#ffdce9'
  error: '#ffb4ab'
  on-error: '#690005'
  error-container: '#93000a'
  on-error-container: '#ffdad6'
  primary-fixed: '#eaddff'
  primary-fixed-dim: '#d2bbff'
  on-primary-fixed: '#25005a'
  on-primary-fixed-variant: '#5a00c6'
  secondary-fixed: '#acedff'
  secondary-fixed-dim: '#4cd7f6'
  on-secondary-fixed: '#001f26'
  on-secondary-fixed-variant: '#004e5c'
  tertiary-fixed: '#ffd8e7'
  tertiary-fixed-dim: '#ffafd3'
  on-tertiary-fixed: '#3d0026'
  on-tertiary-fixed-variant: '#85145a'
  background: '#0b1326'
  on-background: '#dae2fd'
  surface-variant: '#2d3449'
typography:
  display-lg:
    fontFamily: Geist
    fontSize: 64px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: -0.04em
  display-lg-mobile:
    fontFamily: Geist
    fontSize: 40px
    fontWeight: '700'
    lineHeight: '1.2'
    letterSpacing: -0.02em
  headline-md:
    fontFamily: Geist
    fontSize: 32px
    fontWeight: '600'
    lineHeight: '1.3'
    letterSpacing: -0.01em
  body-base:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
    letterSpacing: '0'
  label-mono:
    fontFamily: JetBrains Mono
    fontSize: 12px
    fontWeight: '500'
    lineHeight: '1.2'
    letterSpacing: 0.05em
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  base: 8px
  container-max: 1280px
  gutter: 24px
  margin-mobile: 20px
  section-gap: 120px
---

## Brand & Style

The design system is engineered for **AI-Solutions**, a platform that prioritizes high-tech sophistication and seamless automation. The brand personality is "Advanced Intelligence"—precise, forward-thinking, and effortless.

The visual direction combines **Minimalism** with **Glassmorphism**. This results in a "Hyper-Modern" aesthetic characterized by deep, cinematic backgrounds, vibrant kinetic gradients, and translucent UI layers that suggest depth without physical weight. The UI should evoke a sense of professional mastery and technological elegance.

## Colors

The palette is optimized for a high-contrast dark environment. 

- **Foundation**: A deep midnight background (`#020617`) provides the canvas for depth. 
- **Accents**: We utilize a primary Violet (`#7C3AED`) and secondary Cyan (`#06B6D4`) to create "Electric" gradients. 
- **Gradients**: Use linear gradients at 135 degrees for primary actions and decorative focal points. 
- **Glass Effects**: Semi-transparent overlays use white with 5-10% opacity and a 20px backdrop blur to create the glassmorphic effect over background gradients.

## Typography

This design system utilizes a trio of typefaces to establish technical authority:

1. **Geist**: Used for display and headlines. Its geometric precision reflects the AI's logic. Use tighter letter-spacing on larger sizes to maintain a sleek, "premium" feel.
2. **Inter**: The workhorse for body text, ensuring maximum legibility across dense data and descriptions.
3. **JetBrains Mono**: Reserved for labels, metadata, and technical readouts (e.g., "Uptime", "Model ID") to lean into the developer-centric, automated nature of the product.

## Layout & Spacing

The system employs a **Fluid Grid** model built on an 8px base unit. 

- **Desktop**: 12-column grid with a 1280px max-width. Sections are separated by significant vertical gaps (`120px`) to provide "breathing room" for complex AI information.
- **Tablet**: 8-column grid with 32px margins. 
- **Mobile**: 4-column grid with 20px margins.

Use asymmetrical layouts where cards of varying heights are nested together (bento-box style) to keep the interface dynamic and engaging.

## Elevation & Depth

Hierarchy is established through **Backdrop Blurs** and **Tonal Layering** rather than traditional shadows.

1. **Base Layer**: Deep navy/black background.
2. **Surface Layer**: Dark slate containers with a subtle 1px border (`rgba(255,255,255,0.1)`).
3. **Elevated Layer (Glass)**: Semi-transparent backgrounds with `backdrop-filter: blur(24px)`.
4. **Accent Glows**: Use soft, low-opacity radial gradients (Primary/Secondary colors) positioned *behind* containers to suggest light emitting from the UI elements themselves.

## Shapes

The design system uses a **Rounded** shape language to balance the technical "coldness" of a dark theme with approachability. 

- **Standard Buttons/Inputs**: 0.5rem (8px).
- **Cards**: 1rem (16px) for inner content, 1.5rem (24px) for main container wrappers.
- **Feature Icons**: Enclosed in "Squircle" shapes or circles to contrast against the structural rectangular grid.

## Components

- **Glass Cards**: The signature component. Feature a 1px top-left highlight border to simulate light hitting an edge. Backgrounds should be `rgba(30, 41, 59, 0.5)` with blur.
- **Action Buttons**: Primary buttons use a vibrant gradient (Violet to Cyan). Hover states should trigger a "glow" effect (box-shadow with primary color at 0.5 spread).
- **Status Chips**: Use the Label-Mono font. Backgrounds should be low-opacity versions of the status color (e.g., success = green at 10% opacity) with a solid 1px border.
- **Input Fields**: Ghost-style with a subtle bottom border or 1px stroke. Focus state should transition the border to the primary accent color.
- **Code Snippets**: Specialized containers using JetBrains Mono, a slightly darker background than the surface layer, and syntax highlighting following the primary/secondary palette.
- **Transitions**: All interactive elements must use a `200ms cubic-bezier(0.4, 0, 0.2, 1)` timing function for a "snappy" yet smooth feel.