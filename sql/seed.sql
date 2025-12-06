-- Seed Data for Arofic Bathware

-- Admin User (password: admin123)
INSERT INTO users (name, email, phone, password, role, is_active) VALUES
('Admin', 'admin@arofic.com', '+91 99961 00970', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'super_admin', true);

-- Segments
INSERT INTO segments (name, slug, description, icon, show_in_menu, show_on_home, sort_order) VALUES
('Bath Fittings', 'bath-fittings', 'Premium quality bath fittings and faucets for your bathroom', 'fa-shower', true, true, 1),
('Sanitaryware', 'sanitaryware', 'Complete range of sanitaryware products including basins, toilets and more', 'fa-toilet', true, true, 2),
('Pipes & Fittings', 'pipes-fittings', 'High quality PVC and CPVC pipes and fittings for plumbing', 'fa-pipe', true, true, 3),
('Water Tanks', 'water-tanks', 'Durable water storage tanks with multi-layer technology', 'fa-water', true, true, 4),
('Kitchen Sinks', 'kitchen-sinks', 'Stainless steel and granite kitchen sinks for modern kitchens', 'fa-sink', true, true, 5),
('Designer Collection', 'designer-collection', 'Exclusive designer bathroom fittings and wash basins', 'fa-gem', true, true, 6);

-- Collections
INSERT INTO collections (segment_id, name, slug, description, show_on_home, sort_order) VALUES
(1, 'Premium Faucets', 'premium-faucets', 'Luxury faucet collection', true, 1),
(1, 'Single Lever Series', 'single-lever', 'Easy to use single lever faucets', true, 2),
(2, 'Wash Basins', 'wash-basins', 'Designer wash basins', true, 3),
(6, 'Art Basin Collection', 'art-basin', 'Artistic designer basins', true, 4);

-- Categories
INSERT INTO categories (segment_id, name, slug, description, show_in_menu, show_on_home, sort_order) VALUES
(1, 'Pillar Cock', 'pillar-cock', 'Pillar cock faucets for bathroom', true, true, 1),
(1, 'Bib Cock', 'bib-cock', 'Bib cock taps for bathroom and kitchen', true, true, 2),
(1, 'Basin Mixer', 'basin-mixer', 'Basin mixer taps', true, true, 3),
(1, 'Shower Set', 'shower-set', 'Complete shower sets', true, true, 4),
(1, 'Health Faucet', 'health-faucet', 'Health faucets and hand showers', true, false, 5),
(2, 'Table Top Basin', 'table-top-basin', 'Designer table top wash basins', true, true, 6),
(2, 'Wall Hung Basin', 'wall-hung-basin', 'Wall mounted wash basins', true, false, 7),
(2, 'Pedestal Basin', 'pedestal-basin', 'Full pedestal wash basins', true, false, 8),
(2, 'One Piece WC', 'one-piece-wc', 'One piece western toilet', true, true, 9),
(2, 'Two Piece WC', 'two-piece-wc', 'Two piece western toilet', true, false, 10),
(3, 'PVC Pipes', 'pvc-pipes', 'Agriculture and plumbing PVC pipes', true, true, 11),
(3, 'CPVC Pipes', 'cpvc-pipes', 'Hot and cold water CPVC pipes', true, true, 12),
(3, 'SWR Fittings', 'swr-fittings', 'Soil waste and rainwater fittings', true, false, 13),
(4, 'Three Layer Tank', 'three-layer-tank', 'Classic 3 layer water tanks', true, true, 14),
(4, 'Four Layer Tank', 'four-layer-tank', 'Royal 4 layer water tanks', true, false, 15),
(4, 'Five Layer Tank', 'five-layer-tank', 'Majesty 5 layer water tanks', true, true, 16),
(5, 'Single Bowl Sink', 'single-bowl-sink', 'Single bowl kitchen sinks', true, true, 17),
(5, 'Double Bowl Sink', 'double-bowl-sink', 'Double bowl kitchen sinks', true, true, 18),
(6, 'Designer Basin', 'designer-basin', 'Artistic designer wash basins', true, true, 19),
(6, 'Premium Faucets', 'premium-faucets', 'Premium designer faucets', true, true, 20);

-- Sample Products
INSERT INTO products (segment_id, category_id, name, slug, article_code, sku, short_description, long_description, mrp, selling_price, size_text, is_featured, is_new, show_on_home, status) VALUES
(6, 19, 'Designer Basin 115', 'designer-basin-115', '115', 'DB-115', 'Elegant square designer basin', 'Premium quality designer wash basin with elegant square design. Perfect for modern bathrooms.', 8290.00, 7461.00, '16x16x5', true, true, true, 'active'),
(6, 19, 'Designer Basin 119', 'designer-basin-119', '119', 'DB-119', 'Rectangular designer basin', 'Spacious rectangular wash basin with premium finish.', 5700.00, 5130.00, '24" x 16" x 6"', true, true, true, 'active'),
(6, 19, 'Designer Basin 158', 'designer-basin-158', '158', 'DB-158', 'Compact designer basin', 'Compact yet stylish wash basin for smaller spaces.', 4825.00, 4342.50, '18" x 13" x 5.25"', true, false, true, 'active'),
(6, 19, 'Designer Basin 378', 'designer-basin-378', '378', 'DB-378', 'Premium art basin', 'Artistic premium wash basin with unique design.', 8610.00, 7749.00, '20" x 14" x 5"', true, true, true, 'active'),
(6, 19, 'Designer Basin 525', 'designer-basin-525', '525', 'DB-525', 'Modern designer basin', 'Modern design wash basin for contemporary bathrooms.', 5795.00, 5215.50, '20x16x5', false, true, true, 'active'),
(6, 20, 'Single Lever 1079', 'single-lever-1079', '1079', 'SL-1079', 'Premium single lever faucet', 'High quality single lever faucet with smooth operation.', 7190.00, 6471.00, '16"', true, true, true, 'active'),
(6, 20, 'Single Lever 2084', 'single-lever-2084', '2084', 'SL-2084', 'Modern single lever faucet', 'Modern design single lever faucet for wash basins.', 6200.00, 5580.00, '16"', true, false, true, 'active'),
(6, 4, 'Shower Set Premium', 'shower-set-premium', 'SS-001', 'SS-001', 'Complete premium shower set', 'Complete shower set with rain shower, hand shower and mixer.', 16600.00, 14940.00, 'Standard', true, true, true, 'active'),
(4, 14, 'Classic 3 Layer Tank 500L', 'classic-tank-500', 'CLT-500', 'CLT-500', '500 Litre 3 layer water tank', 'Heavy duty 3 layer water storage tank with food grade inner layer.', 3500.00, 3150.00, '500 Litres', false, false, true, 'active'),
(4, 16, 'Majesty 5 Layer Tank 1000L', 'majesty-tank-1000', 'MJT-1000', 'MJT-1000', '1000 Litre 5 layer water tank', 'Premium 5 layer water tank with multicolor textured finish.', 8500.00, 7650.00, '1000 Litres', true, true, true, 'active'),
(3, 11, 'PVC Pipe 4 inch Class 3', 'pvc-pipe-4-class3', 'PVC-4-C3', 'PVC-4-C3', '4 inch PVC pipe 6 meter', 'High quality 4 inch PVC pipe for agriculture and plumbing.', 2397.60, 2157.84, '110mm x 6 Mtr', false, false, true, 'active'),
(3, 12, 'CPVC Pipe 3/4 inch', 'cpvc-pipe-34', 'CPVC-34', 'CPVC-34', '3/4 inch CPVC pipe 3 meter', 'CPVC pipe ideal for hot and cold water supply.', 253.00, 227.70, '20mm x 3 Mtr', false, false, true, 'active');

-- Home Sliders
INSERT INTO home_sliders (slider_group, title, subtitle, description, cta_text, cta_link, image_path, desktop_order, is_active) VALUES
('hero-1', 'Premium Bathware Solutions', 'Transform Your Bathroom', 'Experience luxury with Arofic premium range of bath fittings, sanitaryware, and designer collections. Quality that speaks for itself.', 'Explore Collection', '/category/designer-basin', '/assets/uploads/sliders/hero1.jpg', 1, true),
('hero-1', 'Designer Collection 2025', 'Exclusive Designs', 'Discover our new designer collection featuring elegant wash basins and premium faucets for the modern home.', 'View Designer Range', '/segment/designer-collection', '/assets/uploads/sliders/hero2.jpg', 2, true),
('hero-2', 'Water Storage Tanks', 'Multi-Layer Technology', 'Durable water storage tanks with 3 to 10 layer technology. Food grade material for safe water storage.', 'Shop Tanks', '/segment/water-tanks', '/assets/uploads/sliders/hero3.jpg', 1, true),
('hero-3', 'Pipes & Fittings', 'Quality Plumbing Solutions', 'Complete range of PVC and CPVC pipes and fittings for all your plumbing needs. ISI certified quality.', 'Browse Pipes', '/segment/pipes-fittings', '/assets/uploads/sliders/hero4.jpg', 1, true);

-- Home Sections
INSERT INTO home_sections (section_key, title, subtitle, content_html, layout_type, sort_order, is_active) VALUES
('home_about', 'About Arofic', 'Established in 1995', '<p>Arofic brand came into existence in 2014 and has since grown to become a leading name in the plumbing industry. With over 200+ channel partners and 100,000+ customer reach across India.</p>', 'text-center', 1, true),
('home_segments', 'Our Product Range', 'Complete Plumbing Solutions', '', 'grid-6', 2, true),
('home_featured_products', 'Featured Products', 'Handpicked for You', '', 'carousel', 3, true),
('home_categories', 'Shop by Category', 'Browse Our Collections', '', 'grid-4', 4, true),
('home_designer', 'Designer Collection', 'Luxury Meets Innovation', '<p>Explore our exclusive designer collection featuring artistic wash basins and premium faucets.</p>', 'image-right', 5, true),
('home_tanks', 'Water Storage Tanks', 'Multi-Layer Technology', '<p>Durable tanks with 3 to 10 layer construction for safe water storage.</p>', 'image-left', 6, true),
('home_technology', 'Our Technology', 'Innovation at Core', '<p>We use state-of-the-art manufacturing technology to deliver products that meet international quality standards.</p>', 'text-center', 7, true),
('home_usps', 'Why Choose Arofic', 'Quality You Can Trust', '', 'grid-4', 8, true),
('home_stats', 'Our Achievements', 'Numbers That Matter', '', 'stats-counter', 9, true),
('home_video', 'Watch Our Story', 'See Arofic in Action', '', 'video-center', 10, true),
('home_testimonials', 'Customer Reviews', 'What Our Customers Say', '', 'carousel', 11, true),
('home_gallery', 'Project Gallery', 'Our Installations', '', 'masonry', 12, true),
('home_faq', 'Frequently Asked Questions', 'Get Your Answers', '', 'accordion', 13, true),
('home_blogs', 'Latest from Blog', 'Tips & Updates', '', 'grid-3', 14, true),
('home_catalogues', 'Download Catalogues', 'Explore Our Full Range', '', 'grid-3', 15, true),
('home_dealer_cta', 'Become a Dealer', 'Partner With Us', '<p>Join our growing network of dealers and distributors across India.</p>', 'cta-banner', 16, true);

-- About Sections
INSERT INTO about_sections (title, slug, content_html, layout_type, sort_order, is_active) VALUES
('Our Story', 'our-story', '<p>Established in 1995 in Sirsa, Haryana under the leadership of Mr. Rajiv Kumar Gupta & Mr. Sanjiv Kumar Gupta, we started with the trading of PVC Pipes & Fittings. Over two decades, we established ourselves among the manufacturers of PVC Pipes & Fittings and Roto Moulded Water Storage Tanks.</p><p>AROFIC brand name came into existence in 2014 and since then company has undergone large extension and added wide range of sanitaryware products under its name.</p>', 'left-image', 1, true),
('Our Mission', 'our-mission', '<p>Our mission is to establish AROFIC as a leading brand in the plumbing industry by delivering superior quality products that bring value to our partners and customers.</p>', 'right-image', 2, true),
('Our Vision', 'our-vision', '<p>AROFIC constantly strives to pave the way for a future that provides water for everyone and everywhere from the smallest villages to the metro cities.</p>', 'left-image', 3, true),
('Quality Commitment', 'quality', '<p>All products under AROFIC are manufactured using superior quality raw materials and are constantly tested by the team of experts. We have developed a controlled quality management system which places great prominence towards providing finest quality.</p>', 'right-image', 4, true),
('Manufacturing Excellence', 'manufacturing', '<p>Bringing newer technologies and continuous innovation in existing as well as new products has been our main focus. With aim to provide zero defect manufacturing products on competitive prices.</p>', 'left-image', 5, true),
('Pan India Presence', 'presence', '<p>AROFIC has created a Pan India presence with over 200+ channel partners and distributors and over 100,000+ customer reach.</p>', 'full-width', 6, true);

-- Testimonials
INSERT INTO testimonials (name, designation, company, message, rating, show_on_home, show_on_page, sort_order) VALUES
('Rajesh Sharma', 'Owner', 'Sharma Plumbing Works', 'Arofic products are of excellent quality. We have been using their pipes and fittings for over 5 years and never faced any issues.', 5, true, true, 1),
('Amit Verma', 'Contractor', 'Verma Construction', 'The designer basins from Arofic are stunning. Our clients love them and always ask for Arofic products.', 5, true, true, 2),
('Suresh Kumar', 'Dealer', 'Kumar Sanitary Store', 'Best products in the market. Great support from Arofic team and timely delivery.', 5, true, true, 3),
('Priya Singh', 'Homeowner', 'Chandigarh', 'We renovated our entire bathroom with Arofic fittings. Premium quality at reasonable prices.', 5, true, true, 4);

-- FAQs
INSERT INTO faqs (question, answer_html, category, show_on_home, show_on_faq_page, sort_order) VALUES
('What is the warranty on Arofic products?', '<p>Arofic products come with manufacturer warranty. CP Fittings have 5 years warranty, Sanitaryware has 10 years warranty, and Water Tanks have up to 10 years warranty depending on the model.</p>', 'Warranty', true, true, 1),
('Do you provide installation services?', '<p>Arofic works with a network of authorized plumbers and contractors. Please contact your nearest dealer for installation services.</p>', 'Service', true, true, 2),
('Where can I buy Arofic products?', '<p>Arofic products are available through our network of 200+ dealers across India. You can also order online through our website.</p>', 'Purchase', true, true, 3),
('What payment methods do you accept?', '<p>We accept all major payment methods including Credit/Debit Cards, UPI, Net Banking, and Cash on Delivery for select locations.</p>', 'Payment', true, true, 4),
('How long does delivery take?', '<p>Standard delivery takes 5-7 business days. Express delivery options are available for select locations.</p>', 'Delivery', false, true, 5),
('Can I become an Arofic dealer?', '<p>Yes! We are always looking for partners. Please fill out the dealer enquiry form or contact us at info@arofic.com.</p>', 'Dealer', true, true, 6);

-- Settings
INSERT INTO settings (setting_key, setting_value, setting_type, setting_group) VALUES
('site_name', 'Arofic Bathware', 'text', 'general'),
('site_tagline', 'Premium Plumbing Solutions', 'text', 'general'),
('site_email', 'info@arofic.com', 'text', 'general'),
('site_phone', '+91 99961 00970', 'text', 'general'),
('site_address', 'Near Jio-BP Petrol Pump, Dabwali Road, Sirsa-125055, Haryana, India', 'textarea', 'general'),
('facebook_url', 'https://www.facebook.com/people/Arofic-Bathware/100063761630116/', 'text', 'social'),
('instagram_url', 'https://www.instagram.com/aroficbathware/', 'text', 'social'),
('google_maps_embed', '', 'textarea', 'general'),
('razorpay_key_id', '', 'text', 'payment'),
('razorpay_mode', 'test', 'text', 'payment'),
('shipping_free_above', '5000', 'text', 'shipping'),
('default_shipping_cost', '200', 'text', 'shipping');

-- Shipping Methods
INSERT INTO shipping_methods (name, description, price, min_order_amount, estimated_days, is_active) VALUES
('Standard Delivery', 'Regular delivery via courier', 200.00, 0, '5-7 business days', true),
('Express Delivery', 'Fast delivery', 400.00, 0, '2-3 business days', true),
('Free Shipping', 'Free shipping on orders above Rs. 5000', 0.00, 5000.00, '5-7 business days', true);
