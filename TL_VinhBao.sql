--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.23
-- Dumped by pg_dump version 9.6.23

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: postgis; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS postgis WITH SCHEMA public;


--
-- Name: EXTENSION postgis; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION postgis IS 'PostGIS geometry, geography, and raster spatial types and functions';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cong_duoi_de_point; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cong_duoi_de_point (
    gid integer NOT NULL,
    objectid bigint,
    name character varying(254),
    folderpath character varying(254),
    popupinfo character varying(254),
    he_thong character varying(15),
    layer character varying(50),
    ten_tb character varying(50),
    dia_diem character varying(100),
    toa_do_x numeric,
    toa_do_y numeric,
    so_may bigint,
    luuluongtk bigint,
    ghi_chu character varying(250),
    geom public.geometry(Point,4326)
);


ALTER TABLE public.cong_duoi_de_point OWNER TO postgres;

--
-- Name: cong_duoi_de_point_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cong_duoi_de_point_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cong_duoi_de_point_gid_seq OWNER TO postgres;

--
-- Name: cong_duoi_de_point_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cong_duoi_de_point_gid_seq OWNED BY public.cong_duoi_de_point.gid;


--
-- Name: cong_point; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cong_point (
    gid integer NOT NULL,
    objectid bigint,
    name character varying(254),
    folderpath character varying(254),
    symbolid bigint,
    popupinfo character varying(254),
    labelid bigint,
    he_thong character varying(15),
    oid_ bigint,
    layer character varying(50),
    id_text character varying(30),
    ten_cong character varying(100),
    toa_do_x numeric,
    toa_do_y numeric,
    km_de character varying(10),
    tuyen_de character varying(30),
    so_cua bigint,
    khau_do character varying(10),
    kenhsau_cg character varying(100),
    ghi_chu character varying(250),
    loai_cong character varying(50),
    geom public.geometry(Point,4326)
);


ALTER TABLE public.cong_point OWNER TO postgres;

--
-- Name: cong_point_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cong_point_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cong_point_gid_seq OWNER TO postgres;

--
-- Name: cong_point_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cong_point_gid_seq OWNED BY public.cong_point.gid;


--
-- Name: cot_km_point; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cot_km_point (
    gid integer NOT NULL,
    objectid bigint,
    ma character varying(50),
    ten_tuyen character varying(60),
    loai_de character varying(50),
    huyen character varying(50),
    thuoc_tinh character varying(50),
    northing numeric,
    easting numeric,
    elevation numeric,
    id_text character varying(25),
    km_cu2 character varying(50),
    vitri_km character varying(50),
    toa_do_x numeric,
    toa_do_y numeric,
    geom public.geometry(Point,4326)
);


ALTER TABLE public.cot_km_point OWNER TO postgres;

--
-- Name: cot_km_point_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cot_km_point_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cot_km_point_gid_seq OWNER TO postgres;

--
-- Name: cot_km_point_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cot_km_point_gid_seq OWNED BY public.cot_km_point.gid;


--
-- Name: de_tw; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.de_tw (
    gid integer NOT NULL,
    objectid bigint,
    id character varying(40),
    ma character varying(50),
    ten_tuyen character varying(60),
    chieu_dai double precision,
    cap_de character varying(50),
    loai_de character varying(50),
    huyen character varying(50),
    thuoc_tinh character varying(50),
    dtich_baov double precision,
    sodan_baov bigint,
    ddanh_dau character varying(50),
    ddanh_cuoi character varying(50),
    shape_leng numeric,
    geom public.geometry(MultiLineString,4326)
);


ALTER TABLE public.de_tw OWNER TO postgres;

--
-- Name: de_tw_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.de_tw_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.de_tw_gid_seq OWNER TO postgres;

--
-- Name: de_tw_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.de_tw_gid_seq OWNED BY public.de_tw.gid;


--
-- Name: de_tw_phandoan_polyline; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.de_tw_phandoan_polyline (
    gid integer NOT NULL,
    objectid bigint,
    id character varying(40),
    ma_de character varying(50),
    ten_tuyen character varying(60),
    cap_de character varying(50),
    loai_de character varying(50),
    stt bigint,
    ma_pdoan character varying(50),
    shape_leng numeric,
    tukm double precision,
    toikm double precision,
    cd_pd double precision,
    mucnuoc_tk double precision,
    cc_dd_mntk double precision,
    caotrinh_m double precision,
    berong_md double precision,
    hsmd_song double precision,
    hsmd_dong double precision,
    ctcd double precision,
    rong_cd double precision,
    mat_de character varying(20),
    vt_dunsui double precision,
    mn_dunsui double precision,
    xl_dunsui character varying(50),
    tham_cxl character varying(50),
    sat_song character varying(20),
    sat_dong character varying(10),
    tt_nende character varying(10),
    to_moi character varying(50),
    nutde_daxl character varying(50),
    dam_ao character varying(50),
    dong_chay character varying(50),
    mat_thoang character varying(50),
    mo_ta character varying(254),
    kl_od character varying(50),
    kem_od character varying(50),
    xung_yeu character varying(50),
    geom public.geometry(MultiLineString,4326)
);


ALTER TABLE public.de_tw_phandoan_polyline OWNER TO postgres;

--
-- Name: de_tw_phandoan_polyline_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.de_tw_phandoan_polyline_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.de_tw_phandoan_polyline_gid_seq OWNER TO postgres;

--
-- Name: de_tw_phandoan_polyline_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.de_tw_phandoan_polyline_gid_seq OWNED BY public.de_tw_phandoan_polyline.gid;


--
-- Name: diem_canh_de_point; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.diem_canh_de_point (
    gid integer NOT NULL,
    objectid bigint,
    ma_link character varying(50),
    stt bigint,
    ma_diem character varying(50),
    ten_dcd character varying(100),
    tuyen_de character varying(50),
    vi_tri_km character varying(50),
    cap_de bigint,
    dia_danh character varying(50),
    ket_cau character varying(100),
    nam_xdtb character varying(50),
    hien_trang character varying(254),
    danh_gia character varying(254),
    geom public.geometry(Point,4326)
);


ALTER TABLE public.diem_canh_de_point OWNER TO postgres;

--
-- Name: diem_canh_de_point_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.diem_canh_de_point_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.diem_canh_de_point_gid_seq OWNER TO postgres;

--
-- Name: diem_canh_de_point_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.diem_canh_de_point_gid_seq OWNED BY public.diem_canh_de_point.gid;


--
-- Name: diem_nhan_thai_point; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.diem_nhan_thai_point (
    gid integer NOT NULL,
    objectid bigint,
    ma character varying(254),
    tt character varying(254),
    tendn character varying(120),
    diachi character varying(200),
    thon character varying(254),
    xa character varying(254),
    huyen character varying(254),
    nganhsx character varying(254),
    kenhnhan character varying(200),
    loaikenh character varying(20),
    httl character varying(20),
    doituongcp character varying(10),
    dacp character varying(10),
    sogp character varying(50),
    ngaycap character varying(15),
    cqcp character varying(20),
    ubnd_tp character varying(254),
    tctl character varying(254),
    x_nhan numeric,
    y_nhan numeric,
    x_xa numeric,
    y_xa numeric,
    ll_max numeric,
    clxl_40 character varying(10),
    clxl_52mt character varying(10),
    clxl_62mt date,
    clxl_28mt character varying(10),
    clxl_14 character varying(10),
    dai_dien character varying(30),
    chuc_vu character varying(50),
    sdt character varying(254),
    email character varying(254),
    geom public.geometry(Point,4326)
);


ALTER TABLE public.diem_nhan_thai_point OWNER TO postgres;

--
-- Name: diem_nhan_thai_point_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.diem_nhan_thai_point_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.diem_nhan_thai_point_gid_seq OWNER TO postgres;

--
-- Name: diem_nhan_thai_point_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.diem_nhan_thai_point_gid_seq OWNED BY public.diem_nhan_thai_point.gid;


--
-- Name: diem_xa_thai_point; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.diem_xa_thai_point (
    gid integer NOT NULL,
    objectid bigint,
    ma character varying(254),
    tt character varying(254),
    tendn character varying(120),
    diachi character varying(200),
    thon character varying(254),
    xa character varying(254),
    huyen character varying(254),
    nganhsx character varying(254),
    kenhnhan character varying(200),
    loaikenh character varying(20),
    httl character varying(20),
    doituongcp character varying(10),
    dacp character varying(10),
    sogp character varying(50),
    ngaycap character varying(15),
    cqcp character varying(20),
    ubnd_tp character varying(254),
    tctl character varying(254),
    x_nhan numeric,
    y_nhan numeric,
    x_xa numeric,
    y_xa numeric,
    ll_max numeric,
    clxl_40 character varying(10),
    clxl_52mt character varying(10),
    clxl_62mt date,
    clxl_28mt character varying(10),
    clxl_14 character varying(10),
    dai_dien character varying(30),
    chuc_vu character varying(50),
    sdt character varying(254),
    email character varying(254),
    geom public.geometry(Point,4326)
);


ALTER TABLE public.diem_xa_thai_point OWNER TO postgres;

--
-- Name: diem_xa_thai_point_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.diem_xa_thai_point_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.diem_xa_thai_point_gid_seq OWNER TO postgres;

--
-- Name: diem_xa_thai_point_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.diem_xa_thai_point_gid_seq OWNED BY public.diem_xa_thai_point.gid;


--
-- Name: ke_phan_doan_polyline; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ke_phan_doan_polyline (
    gid integer NOT NULL,
    objectid bigint,
    id character varying(40),
    ma character varying(40),
    ten_kelm character varying(50),
    vitri_xy numeric,
    vitri_dial character varying(50),
    vitri_km character varying(50),
    thuoc_tde character varying(50),
    huyen character varying(50),
    thuoc_tinh character varying(50),
    cap_ke character varying(50),
    nam_xd character varying(10),
    nam_tubo character varying(40),
    kcach_chan character varying(10),
    chieu_dai character varying(10),
    chieu_rong character varying(10),
    ddoc_thank character varying(10),
    cao_trinhk character varying(10),
    be_rongco character varying(10),
    ddoc_chank character varying(10),
    ket_cau character varying(50),
    hien_trang character varying(254),
    dvi_qly character varying(50),
    hong_tubo character varying(254),
    lien_ket character varying(254),
    stt bigint,
    ma_link character varying(100),
    shape_leng numeric,
    geom public.geometry(MultiLineString,4326)
);


ALTER TABLE public.ke_phan_doan_polyline OWNER TO postgres;

--
-- Name: ke_phan_doan_polyline_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ke_phan_doan_polyline_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ke_phan_doan_polyline_gid_seq OWNER TO postgres;

--
-- Name: ke_phan_doan_polyline_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ke_phan_doan_polyline_gid_seq OWNED BY public.ke_phan_doan_polyline.gid;


--
-- Name: ke_polyline; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ke_polyline (
    gid integer NOT NULL,
    objectid bigint,
    id character varying(40),
    ma character varying(40),
    ten_kelm character varying(50),
    vitri_km character varying(50),
    thuoc_tde character varying(50),
    huyen character varying(50),
    thuoc_tinh character varying(50),
    cap_ke character varying(50),
    nam_xd character varying(10),
    nam_tubo character varying(40),
    kcach_chan character varying(10),
    chieu_dai character varying(10),
    chieu_rong character varying(10),
    ddoc_thank character varying(10),
    cao_trinhk character varying(10),
    be_rongco character varying(10),
    ddoc_chank character varying(10),
    ket_cau character varying(50),
    hien_trang character varying(254),
    dvi_qly character varying(50),
    hong_tubo character varying(254),
    lien_ket character varying(254),
    shape_leng numeric,
    geom public.geometry(MultiLineString,4326)
);


ALTER TABLE public.ke_polyline OWNER TO postgres;

--
-- Name: ke_polyline_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.ke_polyline_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ke_polyline_gid_seq OWNER TO postgres;

--
-- Name: ke_polyline_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.ke_polyline_gid_seq OWNED BY public.ke_polyline.gid;


--
-- Name: kenh_polyline; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kenh_polyline (
    gid integer NOT NULL,
    objectid bigint,
    name character varying(254),
    folderpath character varying(254),
    symbolid bigint,
    popupinfo character varying(254),
    he_thong character varying(15),
    shape_leng numeric,
    layer character varying(50),
    ten_kenh character varying(100),
    chieu_dai double precision,
    kt_b double precision,
    kt_h double precision,
    kt_m double precision,
    ket_cau character varying(50),
    diem_dau character varying(100),
    diem_cuoi character varying(100),
    xa character varying(25),
    huyen character varying(25),
    ghi_chu character varying(200),
    cqql character varying(50),
    shape_le_1 numeric,
    loai_kenh character varying(50),
    geom public.geometry(MultiLineString,4326)
);


ALTER TABLE public.kenh_polyline OWNER TO postgres;

--
-- Name: kenh_polyline_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.kenh_polyline_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kenh_polyline_gid_seq OWNER TO postgres;

--
-- Name: kenh_polyline_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kenh_polyline_gid_seq OWNED BY public.kenh_polyline.gid;


--
-- Name: kho_vat_tu_point; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.kho_vat_tu_point (
    gid integer NOT NULL,
    objectid bigint,
    id character varying(40),
    ma_link character varying(100),
    stt integer,
    ten_kho character varying(50),
    vitri_km character varying(50),
    thuoc_tde character varying(50),
    thuoc_huye character varying(50),
    dac_diem character varying(100),
    da_hoc_tw double precision,
    da_hoc_dp double precision,
    baotai_tw double precision,
    baotai_dp double precision,
    rothep_tw double precision,
    rothep_dp double precision,
    daram_tw double precision,
    daram_dp double precision,
    catvang_tw double precision,
    catvang_dp double precision,
    vailoc_tw double precision,
    vailoc_dp double precision,
    daythep_tw double precision,
    daythep_dp double precision,
    batcs_tw double precision,
    batcs_dp double precision,
    geom public.geometry(Point,4326)
);


ALTER TABLE public.kho_vat_tu_point OWNER TO postgres;

--
-- Name: kho_vat_tu_point_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.kho_vat_tu_point_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.kho_vat_tu_point_gid_seq OWNER TO postgres;

--
-- Name: kho_vat_tu_point_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.kho_vat_tu_point_gid_seq OWNED BY public.kho_vat_tu_point.gid;


--
-- Name: nha_may_nnuoc_sacch_point; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.nha_may_nnuoc_sacch_point (
    gid integer NOT NULL,
    objectid bigint,
    stt_hang numeric,
    stt character varying(254),
    ten_nmn character varying(254),
    ten_hso character varying(254),
    huyen character varying(50),
    dia_chi character varying(254),
    toa_do character varying(254),
    vd numeric,
    kd numeric,
    dvi_qly character varying(254),
    nam_xdung numeric,
    tong_kpdt numeric,
    von_nn numeric,
    von_dn_cn numeric,
    dautu_them numeric,
    cs_thucte numeric,
    tt_hdong character varying(254),
    vung_pvu character varying(254),
    sdan_sdnuo numeric,
    sho_sdnuoc numeric,
    cl_dky character varying(254),
    nguon_cap character varying(254),
    dg_kn_ncap character varying(254),
    dexuat_xl character varying(254),
    cap_nhat character varying(50),
    ten2 character varying(50),
    geom public.geometry(Point,4326)
);


ALTER TABLE public.nha_may_nnuoc_sacch_point OWNER TO postgres;

--
-- Name: nha_may_nnuoc_sacch_point_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.nha_may_nnuoc_sacch_point_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.nha_may_nnuoc_sacch_point_gid_seq OWNER TO postgres;

--
-- Name: nha_may_nnuoc_sacch_point_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.nha_may_nnuoc_sacch_point_gid_seq OWNED BY public.nha_may_nnuoc_sacch_point.gid;


--
-- Name: tram_bom_point; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.tram_bom_point (
    gid integer NOT NULL,
    objectid bigint,
    name character varying(254),
    folderpath character varying(254),
    popupinfo character varying(254),
    he_thong character varying(15),
    layer character varying(50),
    ten_tb character varying(50),
    dia_diem character varying(100),
    toa_do_x numeric,
    toa_do_y numeric,
    so_may bigint,
    luuluongtk bigint,
    ghi_chu character varying(250),
    geom public.geometry(Point,4326)
);


ALTER TABLE public.tram_bom_point OWNER TO postgres;

--
-- Name: tram_bom_point_gid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.tram_bom_point_gid_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tram_bom_point_gid_seq OWNER TO postgres;

--
-- Name: tram_bom_point_gid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.tram_bom_point_gid_seq OWNED BY public.tram_bom_point.gid;


--
-- Name: cong_duoi_de_point gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cong_duoi_de_point ALTER COLUMN gid SET DEFAULT nextval('public.cong_duoi_de_point_gid_seq'::regclass);


--
-- Name: cong_point gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cong_point ALTER COLUMN gid SET DEFAULT nextval('public.cong_point_gid_seq'::regclass);


--
-- Name: cot_km_point gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cot_km_point ALTER COLUMN gid SET DEFAULT nextval('public.cot_km_point_gid_seq'::regclass);


--
-- Name: de_tw gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.de_tw ALTER COLUMN gid SET DEFAULT nextval('public.de_tw_gid_seq'::regclass);


--
-- Name: de_tw_phandoan_polyline gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.de_tw_phandoan_polyline ALTER COLUMN gid SET DEFAULT nextval('public.de_tw_phandoan_polyline_gid_seq'::regclass);


--
-- Name: diem_canh_de_point gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.diem_canh_de_point ALTER COLUMN gid SET DEFAULT nextval('public.diem_canh_de_point_gid_seq'::regclass);


--
-- Name: diem_nhan_thai_point gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.diem_nhan_thai_point ALTER COLUMN gid SET DEFAULT nextval('public.diem_nhan_thai_point_gid_seq'::regclass);


--
-- Name: diem_xa_thai_point gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.diem_xa_thai_point ALTER COLUMN gid SET DEFAULT nextval('public.diem_xa_thai_point_gid_seq'::regclass);


--
-- Name: ke_phan_doan_polyline gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ke_phan_doan_polyline ALTER COLUMN gid SET DEFAULT nextval('public.ke_phan_doan_polyline_gid_seq'::regclass);


--
-- Name: ke_polyline gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ke_polyline ALTER COLUMN gid SET DEFAULT nextval('public.ke_polyline_gid_seq'::regclass);


--
-- Name: kenh_polyline gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kenh_polyline ALTER COLUMN gid SET DEFAULT nextval('public.kenh_polyline_gid_seq'::regclass);


--
-- Name: kho_vat_tu_point gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kho_vat_tu_point ALTER COLUMN gid SET DEFAULT nextval('public.kho_vat_tu_point_gid_seq'::regclass);


--
-- Name: nha_may_nnuoc_sacch_point gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nha_may_nnuoc_sacch_point ALTER COLUMN gid SET DEFAULT nextval('public.nha_may_nnuoc_sacch_point_gid_seq'::regclass);


--
-- Name: tram_bom_point gid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tram_bom_point ALTER COLUMN gid SET DEFAULT nextval('public.tram_bom_point_gid_seq'::regclass);


--
-- Name: cong_duoi_de_point cong_duoi_de_point_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cong_duoi_de_point
    ADD CONSTRAINT cong_duoi_de_point_pkey PRIMARY KEY (gid);


--
-- Name: cong_point cong_point_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cong_point
    ADD CONSTRAINT cong_point_pkey PRIMARY KEY (gid);


--
-- Name: cot_km_point cot_km_point_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cot_km_point
    ADD CONSTRAINT cot_km_point_pkey PRIMARY KEY (gid);


--
-- Name: de_tw_phandoan_polyline de_tw_phandoan_polyline_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.de_tw_phandoan_polyline
    ADD CONSTRAINT de_tw_phandoan_polyline_pkey PRIMARY KEY (gid);


--
-- Name: de_tw de_tw_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.de_tw
    ADD CONSTRAINT de_tw_pkey PRIMARY KEY (gid);


--
-- Name: diem_canh_de_point diem_canh_de_point_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.diem_canh_de_point
    ADD CONSTRAINT diem_canh_de_point_pkey PRIMARY KEY (gid);


--
-- Name: diem_nhan_thai_point diem_nhan_thai_point_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.diem_nhan_thai_point
    ADD CONSTRAINT diem_nhan_thai_point_pkey PRIMARY KEY (gid);


--
-- Name: diem_xa_thai_point diem_xa_thai_point_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.diem_xa_thai_point
    ADD CONSTRAINT diem_xa_thai_point_pkey PRIMARY KEY (gid);


--
-- Name: ke_phan_doan_polyline ke_phan_doan_polyline_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ke_phan_doan_polyline
    ADD CONSTRAINT ke_phan_doan_polyline_pkey PRIMARY KEY (gid);


--
-- Name: ke_polyline ke_polyline_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ke_polyline
    ADD CONSTRAINT ke_polyline_pkey PRIMARY KEY (gid);


--
-- Name: kenh_polyline kenh_polyline_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kenh_polyline
    ADD CONSTRAINT kenh_polyline_pkey PRIMARY KEY (gid);


--
-- Name: kho_vat_tu_point kho_vat_tu_point_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.kho_vat_tu_point
    ADD CONSTRAINT kho_vat_tu_point_pkey PRIMARY KEY (gid);


--
-- Name: nha_may_nnuoc_sacch_point nha_may_nnuoc_sacch_point_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nha_may_nnuoc_sacch_point
    ADD CONSTRAINT nha_may_nnuoc_sacch_point_pkey PRIMARY KEY (gid);


--
-- Name: tram_bom_point tram_bom_point_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.tram_bom_point
    ADD CONSTRAINT tram_bom_point_pkey PRIMARY KEY (gid);


--
-- Name: cong_duoi_de_point_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cong_duoi_de_point_geom_idx ON public.cong_duoi_de_point USING gist (geom);


--
-- Name: cong_point_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cong_point_geom_idx ON public.cong_point USING gist (geom);


--
-- Name: cot_km_point_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cot_km_point_geom_idx ON public.cot_km_point USING gist (geom);


--
-- Name: de_tw_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX de_tw_geom_idx ON public.de_tw USING gist (geom);


--
-- Name: de_tw_phandoan_polyline_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX de_tw_phandoan_polyline_geom_idx ON public.de_tw_phandoan_polyline USING gist (geom);


--
-- Name: diem_canh_de_point_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX diem_canh_de_point_geom_idx ON public.diem_canh_de_point USING gist (geom);


--
-- Name: diem_nhan_thai_point_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX diem_nhan_thai_point_geom_idx ON public.diem_nhan_thai_point USING gist (geom);


--
-- Name: diem_xa_thai_point_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX diem_xa_thai_point_geom_idx ON public.diem_xa_thai_point USING gist (geom);


--
-- Name: ke_phan_doan_polyline_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX ke_phan_doan_polyline_geom_idx ON public.ke_phan_doan_polyline USING gist (geom);


--
-- Name: ke_polyline_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX ke_polyline_geom_idx ON public.ke_polyline USING gist (geom);


--
-- Name: kenh_polyline_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX kenh_polyline_geom_idx ON public.kenh_polyline USING gist (geom);


--
-- Name: kho_vat_tu_point_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX kho_vat_tu_point_geom_idx ON public.kho_vat_tu_point USING gist (geom);


--
-- Name: nha_may_nnuoc_sacch_point_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX nha_may_nnuoc_sacch_point_geom_idx ON public.nha_may_nnuoc_sacch_point USING gist (geom);


--
-- Name: tram_bom_point_geom_idx; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX tram_bom_point_geom_idx ON public.tram_bom_point USING gist (geom);


--
-- PostgreSQL database dump complete
--

