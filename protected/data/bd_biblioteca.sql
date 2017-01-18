/*###############*/
/*N°1: Creacion de base de datos. (postgres)*/
/*###############*/

--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.8
-- Dumped by pg_dump version 9.4.8
-- Started on 2017-01-05 14:17:43 VET

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 8 (class 2615 OID 116402)
-- Name: prestamos; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA prestamos;


ALTER SCHEMA prestamos OWNER TO postgres;

--
-- TOC entry 1 (class 3079 OID 11861)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2165 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = prestamos, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 174 (class 1259 OID 116403)
-- Name: ejemplares; Type: TABLE; Schema: prestamos; Owner: postgres; Tablespace: 
--

CREATE TABLE ejemplares (
    id integer NOT NULL,
    id_material integer NOT NULL,
    ejemplar text,
    observaciones text DEFAULT 'sin observaciones'::text,
    borrado boolean DEFAULT false,
    fecha_registro timestamp without time zone DEFAULT now(),
    id_status integer DEFAULT 1
);


ALTER TABLE ejemplares OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 116413)
-- Name: Ejemplares_id_seq; Type: SEQUENCE; Schema: prestamos; Owner: postgres
--

CREATE SEQUENCE "Ejemplares_id_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE "Ejemplares_id_seq" OWNER TO postgres;

--
-- TOC entry 2166 (class 0 OID 0)
-- Dependencies: 175
-- Name: Ejemplares_id_seq; Type: SEQUENCE OWNED BY; Schema: prestamos; Owner: postgres
--

ALTER SEQUENCE "Ejemplares_id_seq" OWNED BY ejemplares.id;


--
-- TOC entry 176 (class 1259 OID 116415)
-- Name: prestamo; Type: TABLE; Schema: prestamos; Owner: postgres; Tablespace: 
--

CREATE TABLE prestamo (
    id integer NOT NULL,
    id_prestador integer,
    id_solicitante integer,
    id_tipoprestamo integer,
    id_receptor integer,
    fecha_prestamo timestamp without time zone DEFAULT now(),
    fecha_entrega timestamp without time zone,
    renovacion boolean DEFAULT false,
    borrado boolean DEFAULT false,
    id_status integer,
    cant_material integer
);


ALTER TABLE prestamo OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 116421)
-- Name: prestamo_ejemplar; Type: TABLE; Schema: prestamos; Owner: postgres; Tablespace: 
--

CREATE TABLE prestamo_ejemplar (
    id integer NOT NULL,
    id_prestamo integer,
    id_ejemplar integer,
    borrado boolean DEFAULT false,
    fecha_registro timestamp without time zone DEFAULT now()
);


ALTER TABLE prestamo_ejemplar OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 116426)
-- Name: prestamo_ejemplar_id_seq; Type: SEQUENCE; Schema: prestamos; Owner: postgres
--

CREATE SEQUENCE prestamo_ejemplar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE prestamo_ejemplar_id_seq OWNER TO postgres;

--
-- TOC entry 2167 (class 0 OID 0)
-- Dependencies: 178
-- Name: prestamo_ejemplar_id_seq; Type: SEQUENCE OWNED BY; Schema: prestamos; Owner: postgres
--

ALTER SEQUENCE prestamo_ejemplar_id_seq OWNED BY prestamo_ejemplar.id;


--
-- TOC entry 179 (class 1259 OID 116428)
-- Name: prestamos_id_prest_seq; Type: SEQUENCE; Schema: prestamos; Owner: postgres
--

CREATE SEQUENCE prestamos_id_prest_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE prestamos_id_prest_seq OWNER TO postgres;

--
-- TOC entry 2168 (class 0 OID 0)
-- Dependencies: 179
-- Name: prestamos_id_prest_seq; Type: SEQUENCE OWNED BY; Schema: prestamos; Owner: postgres
--

ALTER SEQUENCE prestamos_id_prest_seq OWNED BY prestamo.id;


--
-- TOC entry 180 (class 1259 OID 116430)
-- Name: status_ejemplar; Type: TABLE; Schema: prestamos; Owner: postgres; Tablespace: 
--

CREATE TABLE status_ejemplar (
    id integer NOT NULL,
    estado_ej text,
    borrado boolean DEFAULT false,
    fecha_registro timestamp without time zone DEFAULT now()
);


ALTER TABLE status_ejemplar OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 116438)
-- Name: status_ejemplar_id_seq; Type: SEQUENCE; Schema: prestamos; Owner: postgres
--

CREATE SEQUENCE status_ejemplar_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE status_ejemplar_id_seq OWNER TO postgres;

--
-- TOC entry 2169 (class 0 OID 0)
-- Dependencies: 181
-- Name: status_ejemplar_id_seq; Type: SEQUENCE OWNED BY; Schema: prestamos; Owner: postgres
--

ALTER SEQUENCE status_ejemplar_id_seq OWNED BY status_ejemplar.id;


--
-- TOC entry 182 (class 1259 OID 116440)
-- Name: status_prestamo; Type: TABLE; Schema: prestamos; Owner: postgres; Tablespace: 
--

CREATE TABLE status_prestamo (
    id integer NOT NULL,
    status text,
    borrado boolean DEFAULT false,
    fecha_registro timestamp without time zone DEFAULT now()
);


ALTER TABLE status_prestamo OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 116448)
-- Name: status_prestamo_id_seq; Type: SEQUENCE; Schema: prestamos; Owner: postgres
--

CREATE SEQUENCE status_prestamo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE status_prestamo_id_seq OWNER TO postgres;

--
-- TOC entry 2170 (class 0 OID 0)
-- Dependencies: 183
-- Name: status_prestamo_id_seq; Type: SEQUENCE OWNED BY; Schema: prestamos; Owner: postgres
--

ALTER SEQUENCE status_prestamo_id_seq OWNED BY status_prestamo.id;


--
-- TOC entry 184 (class 1259 OID 116450)
-- Name: tipo_prestamo; Type: TABLE; Schema: prestamos; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_prestamo (
    id integer NOT NULL,
    tipo_prestamo text,
    borrado boolean DEFAULT false,
    fecha_registro timestamp without time zone DEFAULT now()
);


ALTER TABLE tipo_prestamo OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 116458)
-- Name: tipo_prestamo_id_seq; Type: SEQUENCE; Schema: prestamos; Owner: postgres
--

CREATE SEQUENCE tipo_prestamo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tipo_prestamo_id_seq OWNER TO postgres;

--
-- TOC entry 2171 (class 0 OID 0)
-- Dependencies: 185
-- Name: tipo_prestamo_id_seq; Type: SEQUENCE OWNED BY; Schema: prestamos; Owner: postgres
--

ALTER SEQUENCE tipo_prestamo_id_seq OWNED BY tipo_prestamo.id;


SET search_path = public, pg_catalog;

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
-- TOC entry 2172 (class 0 OID 0)
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
-- TOC entry 2173 (class 0 OID 0)
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
-- TOC entry 2174 (class 0 OID 0)
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
-- TOC entry 2175 (class 0 OID 0)
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
-- TOC entry 2176 (class 0 OID 0)
-- Dependencies: 195
-- Name: tipo_persona_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tipo_persona_id_seq OWNED BY tipo_persona.id;


SET search_path = prestamos, pg_catalog;

--
-- TOC entry 1959 (class 2604 OID 116511)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY ejemplares ALTER COLUMN id SET DEFAULT nextval('"Ejemplares_id_seq"'::regclass);


--
-- TOC entry 1963 (class 2604 OID 116512)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo ALTER COLUMN id SET DEFAULT nextval('prestamos_id_prest_seq'::regclass);


--
-- TOC entry 1966 (class 2604 OID 116513)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo_ejemplar ALTER COLUMN id SET DEFAULT nextval('prestamo_ejemplar_id_seq'::regclass);


--
-- TOC entry 1969 (class 2604 OID 116514)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY status_ejemplar ALTER COLUMN id SET DEFAULT nextval('status_ejemplar_id_seq'::regclass);


--
-- TOC entry 1972 (class 2604 OID 116515)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY status_prestamo ALTER COLUMN id SET DEFAULT nextval('status_prestamo_id_seq'::regclass);


--
-- TOC entry 1975 (class 2604 OID 116516)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY tipo_prestamo ALTER COLUMN id SET DEFAULT nextval('tipo_prestamo_id_seq'::regclass);


SET search_path = public, pg_catalog;

--
-- TOC entry 1980 (class 2604 OID 116517)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY datos ALTER COLUMN id SET DEFAULT nextval('datos_id_seq'::regclass);


--
-- TOC entry 1983 (class 2604 OID 116518)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiales ALTER COLUMN id SET DEFAULT nextval('libros_id_libro_seq'::regclass);


--
-- TOC entry 1986 (class 2604 OID 116519)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY status_persona ALTER COLUMN id SET DEFAULT nextval('status_persona_id_seq'::regclass);


--
-- TOC entry 1988 (class 2604 OID 116520)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_material ALTER COLUMN id SET DEFAULT nextval('tipo_material_id_material_seq'::regclass);


--
-- TOC entry 1991 (class 2604 OID 116521)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tipo_persona ALTER COLUMN id SET DEFAULT nextval('tipo_persona_id_seq'::regclass);


SET search_path = prestamos, pg_catalog;

--
-- TOC entry 2177 (class 0 OID 0)
-- Dependencies: 175
-- Name: Ejemplares_id_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('"Ejemplares_id_seq"', 6, true);


--
-- TOC entry 2136 (class 0 OID 116403)
-- Dependencies: 174
-- Data for Name: ejemplares; Type: TABLE DATA; Schema: prestamos; Owner: postgres
--

COPY ejemplares (id, id_material, ejemplar, observaciones, borrado, fecha_registro, id_status) FROM stdin;
1	12	fsdf25_0	sin observaciones	f	2016-12-24 18:50:52.800545	1
2	12	fsdf25_1	sin observaciones	f	2016-12-24 18:50:52.814546	1
3	12	fsdf25_2	sin observaciones	f	2016-12-24 18:50:52.834547	1
4	12	fsdf25_3	sin observaciones	f	2016-12-24 18:50:52.838547	1
5	12	fsdf25_4	sin observaciones	f	2016-12-24 18:50:52.842547	1
6	12	fsdf25_5	sin observaciones	f	2016-12-24 18:50:52.846547	1
\.


--
-- TOC entry 2138 (class 0 OID 116415)
-- Dependencies: 176
-- Data for Name: prestamo; Type: TABLE DATA; Schema: prestamos; Owner: postgres
--

COPY prestamo (id, id_prestador, id_solicitante, id_tipoprestamo, id_receptor, fecha_prestamo, fecha_entrega, renovacion, borrado, id_status, cant_material) FROM stdin;
\.


--
-- TOC entry 2139 (class 0 OID 116421)
-- Dependencies: 177
-- Data for Name: prestamo_ejemplar; Type: TABLE DATA; Schema: prestamos; Owner: postgres
--

COPY prestamo_ejemplar (id, id_prestamo, id_ejemplar, borrado, fecha_registro) FROM stdin;
\.


--
-- TOC entry 2178 (class 0 OID 0)
-- Dependencies: 178
-- Name: prestamo_ejemplar_id_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('prestamo_ejemplar_id_seq', 1, false);


--
-- TOC entry 2179 (class 0 OID 0)
-- Dependencies: 179
-- Name: prestamos_id_prest_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('prestamos_id_prest_seq', 1, false);


--
-- TOC entry 2142 (class 0 OID 116430)
-- Dependencies: 180
-- Data for Name: status_ejemplar; Type: TABLE DATA; Schema: prestamos; Owner: postgres
--

COPY status_ejemplar (id, estado_ej, borrado, fecha_registro) FROM stdin;
1	Disponible	f	2016-12-21 10:45:18.091661
2	No disponible	f	2016-12-21 10:45:48.687644
3	Dañado	f	2016-12-21 10:46:58.233262
\.


--
-- TOC entry 2180 (class 0 OID 0)
-- Dependencies: 181
-- Name: status_ejemplar_id_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('status_ejemplar_id_seq', 3, true);


--
-- TOC entry 2144 (class 0 OID 116440)
-- Dependencies: 182
-- Data for Name: status_prestamo; Type: TABLE DATA; Schema: prestamos; Owner: postgres
--

COPY status_prestamo (id, status, borrado, fecha_registro) FROM stdin;
1	Vigente	f	2016-12-21 10:12:35.407683
2	Entregado	f	2016-12-21 10:13:05.22976
3	Vencido	f	2016-12-21 10:13:24.272493
4	Renovado	f	2016-12-21 10:13:43.778214
\.


--
-- TOC entry 2181 (class 0 OID 0)
-- Dependencies: 183
-- Name: status_prestamo_id_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('status_prestamo_id_seq', 4, true);


--
-- TOC entry 2146 (class 0 OID 116450)
-- Dependencies: 184
-- Data for Name: tipo_prestamo; Type: TABLE DATA; Schema: prestamos; Owner: postgres
--

COPY tipo_prestamo (id, tipo_prestamo, borrado, fecha_registro) FROM stdin;
1	Sala	f	2016-12-21 10:08:13.163657
2	Circulante	f	2016-12-21 10:08:20.20394
\.


--
-- TOC entry 2182 (class 0 OID 0)
-- Dependencies: 185
-- Name: tipo_prestamo_id_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('tipo_prestamo_id_seq', 2, true);


SET search_path = public, pg_catalog;

--
-- TOC entry 2148 (class 0 OID 116460)
-- Dependencies: 186
-- Data for Name: datos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY datos (id, nombres, apellidos, cedula, telefono, correo, interno, semestre, id_tipo, id_status, username, password, borrado, fecha_registro) FROM stdin;
2	adaf                     	qwewet                   	16262689	51515156161	registro@dominio.com	t	1	2	1	\N	\N	f	2016-12-21 16:40:38.282731
3	lalalalalal              	papapap                  	54545454	45454545454	registro@dominio.com	f	5	2	1	\N	\N	f	2016-12-22 09:13:46.661464
1	asdasd                   	qweqwe                   	12135468	21316513213	registro@dominio.com	\N	\N	1	1	adfeqe	qwqweq	f	2016-12-21 16:16:12.972464
\.


--
-- TOC entry 2183 (class 0 OID 0)
-- Dependencies: 187
-- Name: datos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('datos_id_seq', 4, true);


--
-- TOC entry 2184 (class 0 OID 0)
-- Dependencies: 189
-- Name: libros_id_libro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('libros_id_libro_seq', 12, true);


--
-- TOC entry 2150 (class 0 OID 116472)
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
-- TOC entry 2152 (class 0 OID 116482)
-- Dependencies: 190
-- Data for Name: status_persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY status_persona (id, estado, borrado, fecha_registro) FROM stdin;
1	Activo	f	2016-12-21 09:39:49.556997
2	Inactivo	f	2016-12-21 09:39:55.124998
3	Egresado	f	2016-12-21 09:40:00.347868
\.


--
-- TOC entry 2185 (class 0 OID 0)
-- Dependencies: 191
-- Name: status_persona_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('status_persona_id_seq', 3, true);


--
-- TOC entry 2154 (class 0 OID 116492)
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
-- TOC entry 2186 (class 0 OID 0)
-- Dependencies: 193
-- Name: tipo_material_id_material_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_material_id_material_seq', 5, true);


--
-- TOC entry 2156 (class 0 OID 116501)
-- Dependencies: 194
-- Data for Name: tipo_persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tipo_persona (id, tipo, borrado, fecha_registro) FROM stdin;
1	Usuario	f	2016-12-21 09:38:50.180624
2	Estudiante	f	2016-12-21 09:39:04.368799
3	Profesor	f	2016-12-21 09:39:10.408967
\.


--
-- TOC entry 2187 (class 0 OID 0)
-- Dependencies: 195
-- Name: tipo_persona_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tipo_persona_id_seq', 3, true);


SET search_path = prestamos, pg_catalog;

--
-- TOC entry 1993 (class 2606 OID 116523)
-- Name: ejemplares_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ejemplares
    ADD CONSTRAINT ejemplares_pkey PRIMARY KEY (id);


--
-- TOC entry 1997 (class 2606 OID 116525)
-- Name: prestamo_ejemplar_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY prestamo_ejemplar
    ADD CONSTRAINT prestamo_ejemplar_pkey PRIMARY KEY (id);


--
-- TOC entry 1995 (class 2606 OID 116527)
-- Name: prestamos_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamos_pkey PRIMARY KEY (id);


--
-- TOC entry 1999 (class 2606 OID 116529)
-- Name: status_ejemplar_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY status_ejemplar
    ADD CONSTRAINT status_ejemplar_pkey PRIMARY KEY (id);


--
-- TOC entry 2001 (class 2606 OID 116531)
-- Name: status_prestamo_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY status_prestamo
    ADD CONSTRAINT status_prestamo_pkey PRIMARY KEY (id);


--
-- TOC entry 2003 (class 2606 OID 116533)
-- Name: tipo_prestamo_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_prestamo
    ADD CONSTRAINT tipo_prestamo_pkey PRIMARY KEY (id);


SET search_path = public, pg_catalog;

--
-- TOC entry 2005 (class 2606 OID 116535)
-- Name: datos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY datos
    ADD CONSTRAINT datos_pkey PRIMARY KEY (id);


--
-- TOC entry 2008 (class 2606 OID 116537)
-- Name: libros_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY materiales
    ADD CONSTRAINT libros_pkey PRIMARY KEY (id);


--
-- TOC entry 2010 (class 2606 OID 116539)
-- Name: status_persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY status_persona
    ADD CONSTRAINT status_persona_pkey PRIMARY KEY (id);


--
-- TOC entry 2012 (class 2606 OID 116541)
-- Name: tipo_material_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_material
    ADD CONSTRAINT tipo_material_pkey PRIMARY KEY (id);


--
-- TOC entry 2014 (class 2606 OID 116543)
-- Name: tipo_persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_persona
    ADD CONSTRAINT tipo_persona_pkey PRIMARY KEY (id);


--
-- TOC entry 2006 (class 1259 OID 116544)
-- Name: fki_material_tipo_material_fkey; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_material_tipo_material_fkey ON materiales USING btree (id_tipomat);


SET search_path = prestamos, pg_catalog;

--
-- TOC entry 2015 (class 2606 OID 116545)
-- Name: ejemplares_id_material_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY ejemplares
    ADD CONSTRAINT ejemplares_id_material_fkey FOREIGN KEY (id_material) REFERENCES public.materiales(id);


--
-- TOC entry 2016 (class 2606 OID 116550)
-- Name: ejemplares_id_status_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY ejemplares
    ADD CONSTRAINT ejemplares_id_status_fkey FOREIGN KEY (id_status) REFERENCES status_ejemplar(id);


--
-- TOC entry 2022 (class 2606 OID 116555)
-- Name: prestamo_ejemplar_id_ejemplar_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo_ejemplar
    ADD CONSTRAINT prestamo_ejemplar_id_ejemplar_fkey FOREIGN KEY (id_ejemplar) REFERENCES ejemplares(id);


--
-- TOC entry 2023 (class 2606 OID 116560)
-- Name: prestamo_ejemplar_id_prestamo_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo_ejemplar
    ADD CONSTRAINT prestamo_ejemplar_id_prestamo_fkey FOREIGN KEY (id_prestamo) REFERENCES prestamo(id);


--
-- TOC entry 2017 (class 2606 OID 116565)
-- Name: prestamo_id_status_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamo_id_status_fkey FOREIGN KEY (id_status) REFERENCES status_prestamo(id);


--
-- TOC entry 2018 (class 2606 OID 116570)
-- Name: prestamos_id_prestador_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamos_id_prestador_fkey FOREIGN KEY (id_prestador) REFERENCES public.datos(id);


--
-- TOC entry 2019 (class 2606 OID 116575)
-- Name: prestamos_id_receptor_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamos_id_receptor_fkey FOREIGN KEY (id_receptor) REFERENCES public.datos(id);


--
-- TOC entry 2020 (class 2606 OID 116580)
-- Name: prestamos_id_solicitante_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamos_id_solicitante_fkey FOREIGN KEY (id_solicitante) REFERENCES public.datos(id);


--
-- TOC entry 2021 (class 2606 OID 116585)
-- Name: prestamos_id_tipoprestamo_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamos_id_tipoprestamo_fkey FOREIGN KEY (id_tipoprestamo) REFERENCES tipo_prestamo(id);


SET search_path = public, pg_catalog;

--
-- TOC entry 2024 (class 2606 OID 116590)
-- Name: datos_id_status_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY datos
    ADD CONSTRAINT datos_id_status_fkey FOREIGN KEY (id_status) REFERENCES status_persona(id);


--
-- TOC entry 2025 (class 2606 OID 116595)
-- Name: datos_id_tipo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY datos
    ADD CONSTRAINT datos_id_tipo_fkey FOREIGN KEY (id_tipo) REFERENCES tipo_persona(id);


--
-- TOC entry 2026 (class 2606 OID 116600)
-- Name: material_id_tipomat_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY materiales
    ADD CONSTRAINT material_id_tipomat_fkey FOREIGN KEY (id_tipomat) REFERENCES tipo_material(id);


--
-- TOC entry 2164 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2017-01-05 14:17:43 VET

--
-- PostgreSQL database dump complete
--


###################################
###################################
###################################
###################################
###################################
###################################

/*
Cambios 18/01/2017
Tabla library_data
*/

CREATE TABLE library_data
(
  id serial NOT NULL,
  library_name text,
  library_address text,
  library_manager text,
  library_email text,
  library_mailpass text,
  library_isfrom text,
  CONSTRAINT library_data_pkey PRIMARY KEY (id)
);

CREATE SEQUENCE library_data_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER TABLE library_data OWNER TO postgres;

ALTER TABLE library_data
    ADD CONSTRAINT library_data_pkey PRIMARY KEY (id);

ALTER TABLE library_data_id_seq OWNER TO postgres;

ALTER SEQUENCE library_data_id_seq OWNED BY library_data.id;

ALTER TABLE library_data ALTER COLUMN id SET DEFAULT nextval('library_data_id_seq'::regclass);

