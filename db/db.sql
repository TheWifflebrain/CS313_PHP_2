SELECT * FROM pg_stat_activity;

-- Table: public."Comment"

-- DROP TABLE public."Comment";

CREATE TABLE public."Comment"
(
    "Comment_id" bigint NOT NULL,
    "User_id" bigint NOT NULL,
    "Date" date[] NOT NULL,
    "Message" text[] COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT "Comment_pkey" PRIMARY KEY ("Comment_id"),
    CONSTRAINT "User_id" FOREIGN KEY ("User_id")
        REFERENCES public."User" ("User_id") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Comment"
    OWNER to postgres;

-- Table: public."Homepage"

-- DROP TABLE public."Homepage";

CREATE TABLE public."Homepage"
(
    "Homepage_id" bigint NOT NULL,
    "User_id" bigint NOT NULL,
    CONSTRAINT "Homepage_pkey" PRIMARY KEY ("Homepage_id"),
    CONSTRAINT "User_id" FOREIGN KEY ("User_id")
        REFERENCES public."User" ("User_id") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Homepage"
    OWNER to postgres;

-- Table: public."Keyboard"

-- DROP TABLE public."Keyboard";

CREATE TABLE public."Keyboard"
(
    "Keyboard_id" bigint NOT NULL,
    "Switch" "char"[],
    "Size" "char"[],
    "Type" "char"[],
    "Forsale" bigint,
    "Description" text[] COLLATE pg_catalog."default",
    "Photo" "char"[],
    "Keyboard_name" "char"[] NOT NULL,
    "User_id" bigint NOT NULL,
    CONSTRAINT "Keyboard_pkey" PRIMARY KEY ("Keyboard_id"),
    CONSTRAINT "User_id" FOREIGN KEY ("User_id")
        REFERENCES public."User" ("User_id") MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."Keyboard"
    OWNER to postgres;

-- Table: public."User"

-- DROP TABLE public."User";

CREATE TABLE public."User"
(
    "User_id" bigint NOT NULL,
    "FName" "char"[] NOT NULL,
    "LName" "char"[] NOT NULL,
    "Email" "char"[] NOT NULL,
    "Password" "char"[] NOT NULL,
    "Homepage_id" bigint NOT NULL,
    CONSTRAINT "User_pkey" PRIMARY KEY ("User_id")
)
WITH (
    OIDS = FALSE
)
TABLESPACE pg_default;

ALTER TABLE public."User"
    OWNER to postgres;