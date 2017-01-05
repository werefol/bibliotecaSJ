--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.8
-- Dumped by pg_dump version 9.4.8
-- Started on 2017-01-05 14:21:50 VET

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 186 (class 1259 OID 116460)
-- Name: datos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE datos (
    id integer NOT NULL,
    nombres character(25) NOT NULL,
    apellidos character(25) NOT NULL,
    cedula integer NOT NULL,
    telefono bigint,
    correo text,
    interno boolean DEFAULT true,
    semestre integer,
    id_tipo integer,
    id_status integer DEFAULT 1,
    username text,
    password text,
    borrado boolean DEFAULT false,
    fecha_registro timestamp without time zone DEFAULT now()
);


ALTER TABLE datos OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 116470)
-- Name: datos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE datos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE datos_id_seq OWNER TO postgres;

--
-- TOC entry 2104 (class 0 OID 0)
-- Dependencies: 187
-- Name: datos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE datos_id_seq OWNED BY datos.id;


--
-- TOC entry 188 (class 1259 OID 116472)
-- Name: materiales; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE materiales (
    id integer NOT NULL,
    cota text,
    autor text,
    anio integer,
    editorial text,
    edicion text,
    volumen integer,
    tomo integer,
    tutor text,
    id_tipomat integer,
    titulo text,
    pais text,
    subtitulo text,
    issn text,
    deposito_legal integer,
    mencion text,
    borrado boolean DEFAULT false,
    fecha_registro timestamp without time zone DEFAULT now(),
    cantidad integer
);


ALTER TABLE materiales OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 116480)
-- Name: libros_id_libro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE libros_id_libro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE libros_id_libro_seq OWNER TO postgres;

--
-- TOC entry 2105 (class 0 OID 0)
-- Dependencies: 189
-- Name: libros_id_libro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE libros_id_libro_seq OWNED BY materiales.id;


--
-- TOC entry 190 (class 1259 OID 116482)
-- Name: status_persona; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE status_persona (
    id integer NOT NULL,
    estado text,
    borrado boolean DEFAULT false,
    fecha_registro timestamp without time zone DEFAULT now()
);


ALTER TABLE status_persona OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 116490)
-- Name: status_persona_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE status_persona_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE status_persona_id_seq OWNER TO postgres;

--
-- TOC entry 2106 (class 0 OID 0)
-- Dependencies: 191
-- Name: status_persona_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE status_persona_id_seq OWNED BY status_persona.id;


--
-- TOC entry 192 (class 1259 OID 116492)
-- Name: tipo_material; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_material (
    tipo text,
    id integer NOT NULL,
    borrado boolean DEFAULT false
);


ALTER TABLE tipo_material OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 116499)
-- Name: tipo_material_id_material_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_material_id_material_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_material_id_material_seq OWNER TO postgres;

--
-- TOC entry 2107 (class 0 OID 0)
-- Dependencies: 193
-- Name: tipo_material_id_material_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_material_id_material_seq OWNED BY tipo_material.id;


--
-- TOC entry 194 (class 1259 OID 116501)
-- Name: tipo_persona; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_persona (
    id integer NOT NULL,
    tipo text,
    borrado boolean DEFAULT false,
    fecha_registro timestamp without time zone DEFAULT now()
);


ALTER TABLE tipo_persona OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 116509)
-- Name: tipo_persona_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tipo_persona_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_persona_id_seq OWNER TO postgres;

--
-- TOC entry 2108 (class 0 OID 0)
-- Dependencies: 195
-- Name: tipo_persona_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_persona_id_seq OWNED BY tipo_persona.id;


--
-- TOC entry 1953 (class 2604 OID 116517)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY datos ALTER COLUMN id SET DEFAULT nextval('datos_id_seq'::regclass);


--
-- TOC entry 1956 (class 2604 OID 116518)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiales ALTER COLUMN id SET DEFAULT nextval('libros_id_libro_seq'::regclass);


--
-- TOC entry 1959 (class 2604 OID 116519)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY status_persona ALTER COLUMN id SET DEFAULT nextval('status_persona_id_seq'::regclass);


--
-- TOC entry 1961 (class 2604 OID 116520)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_material ALTER COLUMN id SET DEFAULT nextval('tipo_material_id_material_seq'::regclass);


--
-- TOC entry 1964 (class 2604 OID 116521)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_persona ALTER COLUMN id SET DEFAULT nextval('tipo_persona_id_seq'::regclass);


--
-- TOC entry 2088 (class 0 OID 116460)
-- Dependencies: 186
-- Data for Name: datos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY datos (id, nombres, apellidos, cedula, telefono, correo, interno, semestre, id_tipo, id_status, username, password, borrado, fecha_registro) FROM stdin;
2	adaf                     	qwewet                   	16262689	51515156161	registro@dominio.com	t	1	2	1	\N	\N	f	2016-12-21 16:40:38.282731
3	lalalalalal              	papapap                  	54545454	45454545454	registro@dominio.com	f	5	2	1	\N	\N	f	2016-12-22 09:13:46.661464
1	asdasd                   	qweqwe                   	12135468	21316513213	registro@dominio.com	\N	\N	1	1	adfeqe	qwqweq	f	2016-12-21 16:16:12.972464
\.


--
-- TOC entry 2109 (class 0 OID 0)
-- Dependencies: 187
-- Name: datos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('datos_id_seq', 4, true);


--
-- TOC entry 2110 (class 0 OID 0)
-- Dependencies: 189
-- Name: libros_id_libro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('libros_id_libro_seq', 12, true);


--
-- TOC entry 2090 (class 0 OID 116472)
-- Dependencies: 188
-- Data for Name: materiales; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY materiales (id, cota, autor, anio, editorial, edicion, volumen, tomo, tutor, id_tipomat, titulo, pais, subtitulo, issn, deposito_legal, mencion, borrado, fecha_registro, cantidad) FROM stdin;
2	cre2014	frank	2016			\N	\N		1	libro 1				\N		f	2016-12-24 18:41:25.955387	3
3	cre2014	frank	2016			\N	\N		1	libro 1				\N		f	2016-12-24 18:41:50.92348	3
4	cre2014	frank	2016			\N	\N		1	libro 1				\N		f	2016-12-24 18:42:46.027777	3
5	cre2014	frank	2016			\N	\N		1	libro 1				\N		f	2016-12-24 18:44:17.589019	3
6	cre2014	frank	2016			\N	\N		1	libro 1				\N		f	2016-12-24 18:44:51.700137	3
7	cre2014	frank	2016			\N	\N		1	libro 1				\N		f	2016-12-24 18:45:09.435285	3
8	fsdf25	oaoaoao	\N			\N	\N		1	lalalal				\N		f	2016-12-24 18:46:58.518172	5
9	fsdf25	oaoaoao	\N			\N	\N		1	lalalal				\N		f	2016-12-24 18:47:59.512061	5
10	fsdf25	oaoaoao	\N			\N	\N		1	lalalal				\N		f	2016-12-24 18:48:16.059138	5
11	fsdf25	oaoaoao	\N			\N	\N		1	lalalal				\N		f	2016-12-24 18:48:33.008216	5
12	fsdf25	oaoaoao	\N			\N	\N		1	lalalal				\N		f	2016-12-24 18:50:52.761543	5
1	CQR14	asdasd	2005			0	3	\N	1	ppopopo	Venezuela		\N	\N	\N	f	2016-12-22 12:46:17.914925	3
\.


--
-- TOC entry 2092 (class 0 OID 116482)
-- Dependencies: 190
-- Data for Name: status_persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY status_persona (id, estado, borrado, fecha_registro) FROM stdin;
1	Activo	f	2016-12-21 09:39:49.556997
2	Inactivo	f	2016-12-21 09:39:55.124998
3	Egresado	f	2016-12-21 09:40:00.347868
\.


--
-- TOC entry 2111 (class 0 OID 0)
-- Dependencies: 191
-- Name: status_persona_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('status_persona_id_seq', 3, true);


--
-- TOC entry 2094 (class 0 OID 116492)
-- Dependencies: 192
-- Data for Name: tipo_material; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipo_material (tipo, id, borrado) FROM stdin;
Libro	1	\N
Revista	2	\N
Tesis	3	\N
Diccionario	4	\N
CD	5	\N
\.


--
-- TOC entry 2112 (class 0 OID 0)
-- Dependencies: 193
-- Name: tipo_material_id_material_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_material_id_material_seq', 5, true);


--
-- TOC entry 2096 (class 0 OID 116501)
-- Dependencies: 194
-- Data for Name: tipo_persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipo_persona (id, tipo, borrado, fecha_registro) FROM stdin;
1	Usuario	f	2016-12-21 09:38:50.180624
2	Estudiante	f	2016-12-21 09:39:04.368799
3	Profesor	f	2016-12-21 09:39:10.408967
\.


--
-- TOC entry 2113 (class 0 OID 0)
-- Dependencies: 195
-- Name: tipo_persona_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_persona_id_seq', 3, true);


--
-- TOC entry 1966 (class 2606 OID 116535)
-- Name: datos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY datos
    ADD CONSTRAINT datos_pkey PRIMARY KEY (id);


--
-- TOC entry 1969 (class 2606 OID 116537)
-- Name: libros_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY materiales
    ADD CONSTRAINT libros_pkey PRIMARY KEY (id);


--
-- TOC entry 1971 (class 2606 OID 116539)
-- Name: status_persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY status_persona
    ADD CONSTRAINT status_persona_pkey PRIMARY KEY (id);


--
-- TOC entry 1973 (class 2606 OID 116541)
-- Name: tipo_material_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_material
    ADD CONSTRAINT tipo_material_pkey PRIMARY KEY (id);


--
-- TOC entry 1975 (class 2606 OID 116543)
-- Name: tipo_persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_persona
    ADD CONSTRAINT tipo_persona_pkey PRIMARY KEY (id);


--
-- TOC entry 1967 (class 1259 OID 116544)
-- Name: fki_material_tipo_material_fkey; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_material_tipo_material_fkey ON materiales USING btree (id_tipomat);


--
-- TOC entry 1976 (class 2606 OID 116590)
-- Name: datos_id_status_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY datos
    ADD CONSTRAINT datos_id_status_fkey FOREIGN KEY (id_status) REFERENCES status_persona(id);


--
-- TOC entry 1977 (class 2606 OID 116595)
-- Name: datos_id_tipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY datos
    ADD CONSTRAINT datos_id_tipo_fkey FOREIGN KEY (id_tipo) REFERENCES tipo_persona(id);


--
-- TOC entry 1978 (class 2606 OID 116600)
-- Name: material_id_tipomat_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiales
    ADD CONSTRAINT material_id_tipomat_fkey FOREIGN KEY (id_tipomat) REFERENCES tipo_material(id);


--
-- TOC entry 2103 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2017-01-05 14:21:50 VET

--
-- PostgreSQL database dump complete
--

