# Pazar

```sql
INSERT INTO pazar.popup (pu_image, pu_link, pu_is_active) 
VALUES ('img/Web/popup-banner.jpg', 'https://shopee.co.id/pazar_seasonings', TRUE);

INSERT INTO pazar.headers (h_page_name, h_title_id, h_title_en, h_description_id, h_description_en, h_image, h_link) 
VALUES 
('index', 'Solusi Praktis Memasak', 'Practical Cooking Solutions', 'Kami memproduksi bumbu...', 'We produce quality, halal...', 'img/Web/hero.jpeg', '/history'),
('company', 'Sekilas Perusahaan', 'Company Overview', NULL, NULL, 'img/Web/about.jpeg', NULL),
('history', 'Sejarah Pazar Seasoning', 'Pazar Seasonings History', NULL, NULL, 'img/Web/history.jpeg', NULL),
('products', 'Produk Pazar Seasoning', 'Pazar Seasoning Products', NULL, NULL, 'img/Web/products.jpeg', NULL),
('careerinfo', 'Info Karir', 'Career Info', NULL, NULL, 'img/Web/careerinfo.jpeg', NULL),
('vacancies', 'Lowongan', 'Vacancies', NULL, NULL, 'img/Web/vacancies.jpeg', NULL);

INSERT INTO pazar.why_choose_us (w_title_id, w_title_en, w_description_id, w_description_en, w_icon) 
VALUES
('Koki', 'Master Chefs', 'Diam elitr kasd sed...', 'Diam elitr kasd sed...', 'img/Web/man.svg'),
('Kualitas', 'Quality Food', 'Diam elitr kasd sed...', 'Diam elitr kasd sed...', 'img/Web/utensil.svg'),
('Pesan Online', 'Online Order', 'Diam elitr kasd sed...', 'Diam elitr kasd sed...', 'img/Web/cart.svg'),
('Pelayanan 24/7', '24/7 Service', 'Diam elitr kasd sed...', 'Diam elitr kasd sed...', 'img/Web/call.svg');

INSERT INTO pazar.product_category (pc_title_id, pc_title_en, pc_description_id, pc_description_en, pc_image, pc_link) 
VALUES
('Bumbu Instan', 'Instant Seasoning', 'Bumbu instan berkualitas tinggi...', 'High quality instant seasoning...', 'img/Web/bumbu-instan.jpg', '/products'),
('Sambal', 'Sambal', 'Sambal dengan cita rasa pedas...', 'Sambal with a distinctive spicy...', 'img/Web/sambal.jpg', '/products'),
('Rempah', 'Spices', 'Rempah pilihan berkualitas...', 'Selected quality spices...', 'img/Web/rempah.jpg', '/products'),
('Produk Spesial', 'Special Product', 'Tepung bumbu praktis...', 'Practical seasoned flour...', 'img/Web/produk-spesial.jpg', '/products');

INSERT INTO pazar.certifications (c_label_id, c_label_en, c_title_id, c_title_en, c_description_id, c_description_en, c_image) 
VALUES
('Halal', 'Halal', 'Sertifikat Halal MUI', 'Sertifikat Halal MUI', 'Produk kami telah tersertifikasi halal...', 'Our products have been certified halal...', 'img/web/halal-certification.jpg'),
('Keamanan Pangan', 'Keamanan Pangan', 'Sertifikat HACCP', 'Sertifikat HACCP', 'Sistem manajemen keamanan pangan...', 'Our food safety management system...', 'img/web/haccp-certification.jpg'),
('Standar Internasional', 'Standar Internasional', 'Sertifikat ISO 22000', 'Sertifikat ISO 22000', 'Produk kami telah memenuhi standar...', 'Our products have met the international...', 'img/web/iso-certification.jpg');

INSERT INTO pazar.footer (f_type, f_label_id, f_label_en, f_description_id, f_description_en, f_icon, f_link) 
VALUES
('alamat', 'PT Pristine Prima Lestari', 'PT Pristine Prima Lestari', 'Jl. Vihara No.2, Curug Kulon...', 'Vihara Street No.2, Curug Kulon...', NULL, 'https://g.co/kgs/K4ckX4k'),
('kontak', 'Email', 'Email', 'info@pazarseasonings.com', 'info@pazarseasonings.com', 'img/Web/Email.svg', 'mailto:info@pazarseasonings.com'),
('kontak', 'Telepon', 'Phone', '+62 21 5989 4255', '+62 21 5989 4255', 'img/Web/Phone.svg', 'mailto:info@pazarseasonings.com'),
('Social', 'Instagram', 'Instagram', NULL, NULL, 'img/Web/Instagram.svg', 'https://www.instagram.com/pazarseasonings'),
('Social', 'Facebook', 'Facebook', NULL, NULL, 'img/Web/Facebook.svg', 'https://www.facebook.com/pazarseasonings'),
('Social', 'Whatsapp', 'Whatsapp', NULL, NULL, 'img/Web/Whatsapp.svg', 'https://wa.me/628174918835');

INSERT INTO pazar.product (p_title_id, p_title_en, p_id_product_category, p_description_id, p_description_en, p_image, p_link, p_created_by) 
VALUES
('Bumbu Instan Ayam Goreng', 'Fried Chicken Instant Seasoning', 1, 'Bumbu instan berkualitas tinggi...', 'High quality instant seasoning...', 'img/Product/bumbu-instan-ayam-goreng.jpg', 'product/fried-chicken-instant-seasoning', '12345678'),
('Bumbu Instan Ayam Bakar', 'Roast Chicken Instant Seasoning', 1, 'Bumbu instan berkualitas tinggi...', 'High quality instant seasoning...', 'img/Product/bumbu-instan-ayam-bakar.jpg', 'product/roast-chicken-instant-seasoning', '12345678'),
('Sambal Terasi', 'Sambal Terasi', 2, 'Sambal dengan cita rasa pedas...', 'Sambal dengan cita rasa pedas...', 'img/Product/sambal-terasi.jpg', 'product/sambal-terasi', '12345678'),
('Lada Hitam', 'Black Pepper', 3, 'Rempah pilihan berkualitas...', 'Selected quality spices...', 'img/Product/lada-hitam.jpg', 'product/black-pepper', '12345678'),
('Bumbu Instan Edisi Spesial', 'Instant Seasoning Special Edition', 4, 'Tepung bumbu praktis...', 'Practical seasoned flour...', 'img/Product/bumbu-instan-edisi-spesial.jpg', 'product/instant-seasoning-special-edition', '12345678');

INSERT INTO pazar.product_detail (pd_id_product, pd_longdesc_id, pd_longdesc_en, pd_history_id, pd_history_en, pd_link_shopee, pd_link_tokopedia, pd_link_blibli, pd_link_lazada, pd_created_by) 
VALUES
(1, 'Bumbu Instan Ayam Goreng Pazar Seasonings...', 'Pazar Seasonings Fried Chicken Instant Seasoning...', 'Bumbu Instan Ayam Goreng Pazar Seasonings dikembangkan...', 'Pazar Seasonings Fried Chicken Instant Seasoning was developed...', 'https://shopee.co.id/pazar_seasonings/bumbu-instan-ayam-goreng', 'https://www.tokopedia.com/pazarseasonings/bumbu-instan-ayam-goreng', 'https://www.blibli.com/p/pazar-seasonings-bumbu-instan-ayam-goreng', 'https://www.lazada.co.id/products/pazar-seasonings-bumbu-instan-ayam-goreng', '12345678'),
(2, 'Bumbu Instan Ayam Bakar Pazar Seasonings...', 'Pazar Seasonings Roast Chicken Instant Seasoning...', 'Bumbu Instan Ayam Bakar Pazar Seasonings terinspirasi...', 'Pazar Seasonings Roast Chicken Instant Seasoning is inspired...', 'https://shopee.co.id/pazar_seasonings/bumbu-instan-ayam-bakar', 'https://www.tokopedia.com/pazarseasonings/bumbu-instan-ayam-bakar', 'https://www.blibli.com/p/pazar-seasonings-bumbu-instan-ayam-bakar', 'https://www.lazada.co.id/products/pazar-seasonings-bumbu-instan-ayam-bakar', '12345678'),
(3, 'Sambal Terasi Pazar Seasonings menawarkan...', 'Pazar Seasonings Sambal Terasi offers...', 'Sambal Terasi merupakan salah satu sambal favorit...', 'Sambal Terasi is one of the favorite sambals...', 'https://shopee.co.id/pazar_seasonings/sambal-terasi', 'https://www.tokopedia.com/pazarseasonings/sambal-terasi', 'https://www.blibli.com/p/pazar-seasonings-sambal-terasi', 'https://www.lazada.co.id/products/pazar-seasonings-sambal-terasi', '12345678'),
(4, 'Lada Hitam Pazar Seasonings dipanen saat...', 'Pazar Seasonings Black Pepper is harvested...', 'Lada Hitam merupakan rempah penting...', 'Black Pepper is an important spice...', 'https://shopee.co.id/pazar_seasonings/lada-hitam', 'https://www.tokopedia.com/pazarseasonings/lada-hitam', 'https://www.blibli.com/p/pazar-seasonings-lada-hitam', 'https://www.lazada.co.id/products/pazar-seasonings-lada-hitam', '12345678'),
(5, 'Bumbu Instan Edisi Spesial Pazar Seasonings...', 'Pazar Seasonings Special Edition Instant Seasoning...', 'Bumbu Instan Edisi Spesial dikembangkan...', 'Special Edition Instant Seasoning was developed...', 'https://shopee.co.id/pazar_seasonings/bumbu-instan-edisi-spesial', 'https://www.tokopedia.com/pazarseasonings/bumbu-instan-edisi-spesial', 'https://www.blibli.com/p/pazar-seasonings-bumbu-instan-edisi-spesial', 'https://www.lazada.co.id/products/pazar-seasonings-bumbu-instan-edisi-spesial', '12345678');
```


---

# Login

```sql
INSERT INTO login.users (u_nik, u_username, u_password, u_email) 
VALUES 
('12345678', 'johndoe', 'hashed_password_1', 'john@example.com'), 
('87654321', 'janedoe', 'hashed_password_2', 'jane@example.com');

INSERT INTO login.role (r_role_name, r_levels) 
VALUES
('superadmin', 0),
('admin', 10),
('hr', 10),
('user', 1000);

INSERT INTO login.user_role (ur_user_id, ur_role_id) 
VALUES 
(1, 1), -- johndoe is superadmin
(2, 3); -- janedoe is hr
```