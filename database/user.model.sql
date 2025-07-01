CREATE TABLE IF NOT EXISTS public."users" (
    id uuid NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
    first_name VARCHAR(225) NOT NULL,
    middle_name VARCHAR(225),
    last_name VARCHAR(225) NOT NULL,
    password VARCHAR(225) NOT NULL,
    username VARCHAR(225) NOT NULL,
    role VARCHAR(225) NOT NULL
);
