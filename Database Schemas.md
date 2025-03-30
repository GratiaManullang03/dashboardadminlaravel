# Pazar

```sql
-- Popup table
CREATE TABLE pazar.popup (
    pu_id SERIAL PRIMARY KEY,
    pu_image VARCHAR(255),
    pu_link VARCHAR(255),
    pu_is_active BOOLEAN DEFAULT FALSE
);

-- Headers table
CREATE TABLE pazar.headers (
    h_id SERIAL PRIMARY KEY,
    h_page_name VARCHAR(255) NOT NULL,
    h_title_id VARCHAR(255) NOT NULL,
    h_title_en VARCHAR(255) NOT NULL,
    h_description_id TEXT,
    h_description_en TEXT,
    h_image VARCHAR(255),
    h_link VARCHAR(255)
);

-- Why Choose Us table
CREATE TABLE pazar.why_choose_us (
    w_id SERIAL PRIMARY KEY,
    w_title_id VARCHAR(255) NOT NULL,
    w_title_en VARCHAR(255) NOT NULL,
    w_description_id TEXT,
    w_description_en TEXT,
    w_icon VARCHAR(255)
);

-- Product Category table
CREATE TABLE pazar.product_category (
    pc_id SERIAL PRIMARY KEY,
    pc_title_id VARCHAR(255) NOT NULL,
    pc_title_en VARCHAR(255) NOT NULL,
    pc_description_id TEXT,
    pc_description_en TEXT,
    pc_image VARCHAR(255),
    pc_link VARCHAR(255)
);

-- Certifications table
CREATE TABLE certifications (
    c_id SERIAL PRIMARY KEY,
    c_label_id VARCHAR(255),
    c_label_en VARCHAR(255),
    c_title_id VARCHAR(255) NOT NULL,
    c_title_en VARCHAR(255) NOT NULL,
    c_description_id TEXT,
    c_description_en TEXT,
    c_image VARCHAR(255)
);

-- Footer table
CREATE TABLE pazar.footer (
    f_id SERIAL PRIMARY KEY,
    f_type VARCHAR(50) NOT NULL,
    f_label_id VARCHAR(255),
    f_label_en VARCHAR(255),
    f_description_id TEXT,
    f_description_en TEXT,
    f_icon VARCHAR(255),
    f_link VARCHAR(255)
);

-- Product table
CREATE TABLE pazar.product (
    p_id SERIAL PRIMARY KEY,
    p_title_id VARCHAR(255) NOT NULL,
    p_title_en VARCHAR(255) NOT NULL,
    p_id_product_category INTEGER NOT NULL,
    p_description_id TEXT,
    p_description_en TEXT,
    p_image VARCHAR(255),
    p_link VARCHAR(255),
    p_created_by VARCHAR(20) NOT NULL,
    p_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    p_updated_by VARCHAR(20),
    p_updated_at TIMESTAMP,
    p_is_active BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (p_id_product_category) REFERENCES product_category(pc_id)
);

-- Product Detail table
CREATE TABLE pazar.product_detail (
    pd_id SERIAL PRIMARY KEY,
    pd_id_product INTEGER NOT NULL,
    pd_longdesc_id TEXT,
    pd_longdesc_en TEXT,
    pd_history_id TEXT,
    pd_history_en TEXT,
    pd_link_shopee VARCHAR(255),
    pd_link_tokopedia VARCHAR(255),
    pd_link_blibli VARCHAR(255),
    pd_link_lazada VARCHAR(255),
    pd_created_by VARCHAR(20) NOT NULL,
    pd_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    pd_updated_by VARCHAR(20),
    pd_updated_at TIMESTAMP,
    FOREIGN KEY (pd_id_product) REFERENCES product(p_id)
);
```


---

# Login

```sql
-- User table
CREATE TABLE login.users (
    u_id SERIAL PRIMARY KEY,
    u_nik VARCHAR(20) NOT NULL,
    u_username VARCHAR(50) NOT NULL UNIQUE,
    u_password VARCHAR(255) NOT NULL,
    u_email VARCHAR(100) NOT NULL UNIQUE,
    u_created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Role table
CREATE TABLE login.role (
    r_id SERIAL PRIMARY KEY,
    r_role_name VARCHAR(50) NOT NULL UNIQUE,
    r_levels INT
);

-- User Role table
CREATE TABLE login.user_role (
    ur_user_id INT REFERENCES users(u_id) ON DELETE CASCADE,
    ur_role_id INT REFERENCES role(r_id) ON DELETE CASCADE,
    PRIMARY KEY (ur_user_id, ur_role_id)
);
```