--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3
-- Dumped by pg_dump version 16.3

-- Started on 2024-07-01 21:19:58

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 218 (class 1259 OID 16488)
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categorias (
    id_categoria integer NOT NULL,
    nombre_categoria character varying(100) NOT NULL
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16487)
-- Name: categorias_id_categoria_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categorias_id_categoria_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categorias_id_categoria_seq OWNER TO postgres;

--
-- TOC entry 4899 (class 0 OID 0)
-- Dependencies: 217
-- Name: categorias_id_categoria_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorias_id_categoria_seq OWNED BY public.categorias.id_categoria;


--
-- TOC entry 220 (class 1259 OID 16495)
-- Name: libros; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.libros (
    id_libro integer NOT NULL,
    titulo character varying(200) NOT NULL,
    autor character varying(100) NOT NULL,
    editorial character varying(100),
    "año_publicacion" integer,
    isbn character varying(20),
    cantidad integer NOT NULL,
    id_categoria integer
);


ALTER TABLE public.libros OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16494)
-- Name: libros_id_libro_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.libros_id_libro_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.libros_id_libro_seq OWNER TO postgres;

--
-- TOC entry 4900 (class 0 OID 0)
-- Dependencies: 219
-- Name: libros_id_libro_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.libros_id_libro_seq OWNED BY public.libros.id_libro;


--
-- TOC entry 222 (class 1259 OID 16509)
-- Name: prestamos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.prestamos (
    id_prestamo integer NOT NULL,
    id_usuario integer NOT NULL,
    id_libro integer NOT NULL,
    fecha_prestamo date NOT NULL,
    fecha_devolucion date,
    estado character varying(50) NOT NULL,
    CONSTRAINT prestamos_estado_check CHECK (((estado)::text = ANY ((ARRAY['prestado'::character varying, 'devuelto'::character varying])::text[])))
);


ALTER TABLE public.prestamos OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16508)
-- Name: prestamos_id_prestamo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.prestamos_id_prestamo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.prestamos_id_prestamo_seq OWNER TO postgres;

--
-- TOC entry 4901 (class 0 OID 0)
-- Dependencies: 221
-- Name: prestamos_id_prestamo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.prestamos_id_prestamo_seq OWNED BY public.prestamos.id_prestamo;


--
-- TOC entry 224 (class 1259 OID 16527)
-- Name: reservas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reservas (
    id_reserva integer NOT NULL,
    id_usuario integer NOT NULL,
    id_libro integer NOT NULL,
    fecha_reserva date NOT NULL,
    estado_reserva character varying(50) NOT NULL,
    CONSTRAINT reservas_estado_reserva_check CHECK (((estado_reserva)::text = ANY ((ARRAY['pendiente'::character varying, 'completada'::character varying, 'cancelada'::character varying])::text[])))
);


ALTER TABLE public.reservas OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 16526)
-- Name: reservas_id_reserva_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.reservas_id_reserva_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.reservas_id_reserva_seq OWNER TO postgres;

--
-- TOC entry 4902 (class 0 OID 0)
-- Dependencies: 223
-- Name: reservas_id_reserva_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.reservas_id_reserva_seq OWNED BY public.reservas.id_reserva;


--
-- TOC entry 216 (class 1259 OID 16476)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id_usuario integer NOT NULL,
    nombre character varying(100) NOT NULL,
    email character varying(100) NOT NULL,
    contrasena character varying(255) NOT NULL,
    tipo_usuario character varying(50) NOT NULL,
    google2fa_secret character varying(255),
    "codigoRec" character varying(45),
    CONSTRAINT usuarios_tipo_usuario_check CHECK (((tipo_usuario)::text = ANY ((ARRAY['admin'::character varying, 'usuario'::character varying])::text[])))
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 16475)
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 4903 (class 0 OID 0)
-- Dependencies: 215
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_usuario_seq OWNED BY public.usuarios.id_usuario;


--
-- TOC entry 4709 (class 2604 OID 16491)
-- Name: categorias id_categoria; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias ALTER COLUMN id_categoria SET DEFAULT nextval('public.categorias_id_categoria_seq'::regclass);


--
-- TOC entry 4710 (class 2604 OID 16498)
-- Name: libros id_libro; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.libros ALTER COLUMN id_libro SET DEFAULT nextval('public.libros_id_libro_seq'::regclass);


--
-- TOC entry 4711 (class 2604 OID 16512)
-- Name: prestamos id_prestamo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prestamos ALTER COLUMN id_prestamo SET DEFAULT nextval('public.prestamos_id_prestamo_seq'::regclass);


--
-- TOC entry 4712 (class 2604 OID 16530)
-- Name: reservas id_reserva; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reservas ALTER COLUMN id_reserva SET DEFAULT nextval('public.reservas_id_reserva_seq'::regclass);


--
-- TOC entry 4708 (class 2604 OID 16479)
-- Name: usuarios id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuarios_id_usuario_seq'::regclass);


--
-- TOC entry 4887 (class 0 OID 16488)
-- Dependencies: 218
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorias (id_categoria, nombre_categoria) FROM stdin;
1	Videos porno incesto
\.


--
-- TOC entry 4889 (class 0 OID 16495)
-- Dependencies: 220
-- Data for Name: libros; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.libros (id_libro, titulo, autor, editorial, "año_publicacion", isbn, cantidad, id_categoria) FROM stdin;
\.


--
-- TOC entry 4891 (class 0 OID 16509)
-- Dependencies: 222
-- Data for Name: prestamos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.prestamos (id_prestamo, id_usuario, id_libro, fecha_prestamo, fecha_devolucion, estado) FROM stdin;
\.


--
-- TOC entry 4893 (class 0 OID 16527)
-- Dependencies: 224
-- Data for Name: reservas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.reservas (id_reserva, id_usuario, id_libro, fecha_reserva, estado_reserva) FROM stdin;
\.


--
-- TOC entry 4885 (class 0 OID 16476)
-- Dependencies: 216
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id_usuario, nombre, email, contrasena, tipo_usuario, google2fa_secret, "codigoRec") FROM stdin;
\.


--
-- TOC entry 4904 (class 0 OID 0)
-- Dependencies: 217
-- Name: categorias_id_categoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorias_id_categoria_seq', 1, true);


--
-- TOC entry 4905 (class 0 OID 0)
-- Dependencies: 219
-- Name: libros_id_libro_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.libros_id_libro_seq', 1, false);


--
-- TOC entry 4906 (class 0 OID 0)
-- Dependencies: 221
-- Name: prestamos_id_prestamo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.prestamos_id_prestamo_seq', 1, false);


--
-- TOC entry 4907 (class 0 OID 0)
-- Dependencies: 223
-- Name: reservas_id_reserva_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.reservas_id_reserva_seq', 1, false);


--
-- TOC entry 4908 (class 0 OID 0)
-- Dependencies: 215
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_usuario_seq', 1, false);


--
-- TOC entry 4722 (class 2606 OID 16493)
-- Name: categorias categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id_categoria);


--
-- TOC entry 4725 (class 2606 OID 16502)
-- Name: libros libros_isbn_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.libros
    ADD CONSTRAINT libros_isbn_key UNIQUE (isbn);


--
-- TOC entry 4727 (class 2606 OID 16500)
-- Name: libros libros_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.libros
    ADD CONSTRAINT libros_pkey PRIMARY KEY (id_libro);


--
-- TOC entry 4731 (class 2606 OID 16515)
-- Name: prestamos prestamos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT prestamos_pkey PRIMARY KEY (id_prestamo);


--
-- TOC entry 4735 (class 2606 OID 16533)
-- Name: reservas reservas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (id_reserva);


--
-- TOC entry 4718 (class 2606 OID 16486)
-- Name: usuarios usuarios_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_email_key UNIQUE (email);


--
-- TOC entry 4720 (class 2606 OID 16484)
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 4723 (class 1259 OID 16545)
-- Name: idx_libro_isbn; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_libro_isbn ON public.libros USING btree (isbn);


--
-- TOC entry 4728 (class 1259 OID 16547)
-- Name: idx_prestamo_libro; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_prestamo_libro ON public.prestamos USING btree (id_libro);


--
-- TOC entry 4729 (class 1259 OID 16546)
-- Name: idx_prestamo_usuario; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_prestamo_usuario ON public.prestamos USING btree (id_usuario);


--
-- TOC entry 4732 (class 1259 OID 16549)
-- Name: idx_reserva_libro; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_reserva_libro ON public.reservas USING btree (id_libro);


--
-- TOC entry 4733 (class 1259 OID 16548)
-- Name: idx_reserva_usuario; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_reserva_usuario ON public.reservas USING btree (id_usuario);


--
-- TOC entry 4716 (class 1259 OID 16544)
-- Name: idx_usuario_email; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX idx_usuario_email ON public.usuarios USING btree (email);


--
-- TOC entry 4736 (class 2606 OID 16503)
-- Name: libros libros_id_categoria_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.libros
    ADD CONSTRAINT libros_id_categoria_fkey FOREIGN KEY (id_categoria) REFERENCES public.categorias(id_categoria);


--
-- TOC entry 4737 (class 2606 OID 16521)
-- Name: prestamos prestamos_id_libro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT prestamos_id_libro_fkey FOREIGN KEY (id_libro) REFERENCES public.libros(id_libro);


--
-- TOC entry 4738 (class 2606 OID 16516)
-- Name: prestamos prestamos_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.prestamos
    ADD CONSTRAINT prestamos_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id_usuario);


--
-- TOC entry 4739 (class 2606 OID 16539)
-- Name: reservas reservas_id_libro_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_id_libro_fkey FOREIGN KEY (id_libro) REFERENCES public.libros(id_libro);


--
-- TOC entry 4740 (class 2606 OID 16534)
-- Name: reservas reservas_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuarios(id_usuario);


-- Completed on 2024-07-01 21:19:58

--
-- PostgreSQL database dump complete
--

