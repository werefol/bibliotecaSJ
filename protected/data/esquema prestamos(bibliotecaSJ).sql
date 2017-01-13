--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.8
-- Dumped by pg_dump version 9.4.8
-- Started on 2017-01-05 14:22:06 VET

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
-- TOC entry 2117 (class 0 OID 0)
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
-- TOC entry 2118 (class 0 OID 0)
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
-- TOC entry 2119 (class 0 OID 0)
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
-- TOC entry 2120 (class 0 OID 0)
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
-- TOC entry 2121 (class 0 OID 0)
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
-- TOC entry 2122 (class 0 OID 0)
-- Dependencies: 185
-- Name: tipo_prestamo_id_seq; Type: SEQUENCE OWNED BY; Schema: prestamos; Owner: postgres
--

ALTER SEQUENCE tipo_prestamo_id_seq OWNED BY tipo_prestamo.id;


--
-- TOC entry 1954 (class 2604 OID 116511)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY ejemplares ALTER COLUMN id SET DEFAULT nextval('"Ejemplares_id_seq"'::regclass);


--
-- TOC entry 1958 (class 2604 OID 116512)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo ALTER COLUMN id SET DEFAULT nextval('prestamos_id_prest_seq'::regclass);


--
-- TOC entry 1961 (class 2604 OID 116513)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo_ejemplar ALTER COLUMN id SET DEFAULT nextval('prestamo_ejemplar_id_seq'::regclass);


--
-- TOC entry 1964 (class 2604 OID 116514)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY status_ejemplar ALTER COLUMN id SET DEFAULT nextval('status_ejemplar_id_seq'::regclass);


--
-- TOC entry 1967 (class 2604 OID 116515)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY status_prestamo ALTER COLUMN id SET DEFAULT nextval('status_prestamo_id_seq'::regclass);


--
-- TOC entry 1970 (class 2604 OID 116516)
-- Name: id; Type: DEFAULT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY tipo_prestamo ALTER COLUMN id SET DEFAULT nextval('tipo_prestamo_id_seq'::regclass);


--
-- TOC entry 2123 (class 0 OID 0)
-- Dependencies: 175
-- Name: Ejemplares_id_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('"Ejemplares_id_seq"', 6, true);


--
-- TOC entry 2101 (class 0 OID 116403)
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
-- TOC entry 2103 (class 0 OID 116415)
-- Dependencies: 176
-- Data for Name: prestamo; Type: TABLE DATA; Schema: prestamos; Owner: postgres
--

COPY prestamo (id, id_prestador, id_solicitante, id_tipoprestamo, id_receptor, fecha_prestamo, fecha_entrega, renovacion, borrado, id_status, cant_material) FROM stdin;
\.


--
-- TOC entry 2104 (class 0 OID 116421)
-- Dependencies: 177
-- Data for Name: prestamo_ejemplar; Type: TABLE DATA; Schema: prestamos; Owner: postgres
--

COPY prestamo_ejemplar (id, id_prestamo, id_ejemplar, borrado, fecha_registro) FROM stdin;
\.


--
-- TOC entry 2124 (class 0 OID 0)
-- Dependencies: 178
-- Name: prestamo_ejemplar_id_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('prestamo_ejemplar_id_seq', 1, false);


--
-- TOC entry 2125 (class 0 OID 0)
-- Dependencies: 179
-- Name: prestamos_id_prest_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('prestamos_id_prest_seq', 1, false);


--
-- TOC entry 2107 (class 0 OID 116430)
-- Dependencies: 180
-- Data for Name: status_ejemplar; Type: TABLE DATA; Schema: prestamos; Owner: postgres
--

COPY status_ejemplar (id, estado_ej, borrado, fecha_registro) FROM stdin;
1	Disponible	f	2016-12-21 10:45:18.091661
2	No disponible	f	2016-12-21 10:45:48.687644
3	Dañado	f	2016-12-21 10:46:58.233262
\.


--
-- TOC entry 2126 (class 0 OID 0)
-- Dependencies: 181
-- Name: status_ejemplar_id_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('status_ejemplar_id_seq', 3, true);


--
-- TOC entry 2109 (class 0 OID 116440)
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
-- TOC entry 2127 (class 0 OID 0)
-- Dependencies: 183
-- Name: status_prestamo_id_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('status_prestamo_id_seq', 4, true);


--
-- TOC entry 2111 (class 0 OID 116450)
-- Dependencies: 184
-- Data for Name: tipo_prestamo; Type: TABLE DATA; Schema: prestamos; Owner: postgres
--

COPY tipo_prestamo (id, tipo_prestamo, borrado, fecha_registro) FROM stdin;
1	Sala	f	2016-12-21 10:08:13.163657
2	Circulante	f	2016-12-21 10:08:20.20394
\.


--
-- TOC entry 2128 (class 0 OID 0)
-- Dependencies: 185
-- Name: tipo_prestamo_id_seq; Type: SEQUENCE SET; Schema: prestamos; Owner: postgres
--

SELECT pg_catalog.setval('tipo_prestamo_id_seq', 2, true);


--
-- TOC entry 1972 (class 2606 OID 116523)
-- Name: ejemplares_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ejemplares
    ADD CONSTRAINT ejemplares_pkey PRIMARY KEY (id);


--
-- TOC entry 1976 (class 2606 OID 116525)
-- Name: prestamo_ejemplar_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY prestamo_ejemplar
    ADD CONSTRAINT prestamo_ejemplar_pkey PRIMARY KEY (id);


--
-- TOC entry 1974 (class 2606 OID 116527)
-- Name: prestamos_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamos_pkey PRIMARY KEY (id);


--
-- TOC entry 1978 (class 2606 OID 116529)
-- Name: status_ejemplar_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY status_ejemplar
    ADD CONSTRAINT status_ejemplar_pkey PRIMARY KEY (id);


--
-- TOC entry 1980 (class 2606 OID 116531)
-- Name: status_prestamo_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY status_prestamo
    ADD CONSTRAINT status_prestamo_pkey PRIMARY KEY (id);


--
-- TOC entry 1982 (class 2606 OID 116533)
-- Name: tipo_prestamo_pkey; Type: CONSTRAINT; Schema: prestamos; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_prestamo
    ADD CONSTRAINT tipo_prestamo_pkey PRIMARY KEY (id);


--
-- TOC entry 1983 (class 2606 OID 116545)
-- Name: ejemplares_id_material_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY ejemplares
    ADD CONSTRAINT ejemplares_id_material_fkey FOREIGN KEY (id_material) REFERENCES public.materiales(id);


--
-- TOC entry 1984 (class 2606 OID 116550)
-- Name: ejemplares_id_status_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY ejemplares
    ADD CONSTRAINT ejemplares_id_status_fkey FOREIGN KEY (id_status) REFERENCES status_ejemplar(id);


--
-- TOC entry 1990 (class 2606 OID 116555)
-- Name: prestamo_ejemplar_id_ejemplar_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo_ejemplar
    ADD CONSTRAINT prestamo_ejemplar_id_ejemplar_fkey FOREIGN KEY (id_ejemplar) REFERENCES ejemplares(id);


--
-- TOC entry 1991 (class 2606 OID 116560)
-- Name: prestamo_ejemplar_id_prestamo_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo_ejemplar
    ADD CONSTRAINT prestamo_ejemplar_id_prestamo_fkey FOREIGN KEY (id_prestamo) REFERENCES prestamo(id);


--
-- TOC entry 1985 (class 2606 OID 116565)
-- Name: prestamo_id_status_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamo_id_status_fkey FOREIGN KEY (id_status) REFERENCES status_prestamo(id);


--
-- TOC entry 1986 (class 2606 OID 116570)
-- Name: prestamos_id_prestador_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamos_id_prestador_fkey FOREIGN KEY (id_prestador) REFERENCES public.datos(id);


--
-- TOC entry 1987 (class 2606 OID 116575)
-- Name: prestamos_id_receptor_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamos_id_receptor_fkey FOREIGN KEY (id_receptor) REFERENCES public.datos(id);


--
-- TOC entry 1988 (class 2606 OID 116580)
-- Name: prestamos_id_solicitante_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamos_id_solicitante_fkey FOREIGN KEY (id_solicitante) REFERENCES public.datos(id);


--
-- TOC entry 1989 (class 2606 OID 116585)
-- Name: prestamos_id_tipoprestamo_fkey; Type: FK CONSTRAINT; Schema: prestamos; Owner: postgres
--

ALTER TABLE ONLY prestamo
    ADD CONSTRAINT prestamos_id_tipoprestamo_fkey FOREIGN KEY (id_tipoprestamo) REFERENCES tipo_prestamo(id);


-- Completed on 2017-01-05 14:22:06 VET

--
-- PostgreSQL database dump complete
--

