CREATE TABLE IF NOT EXISTS public.meeting (
    id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
    meeting_name VARCHAR(100) NOT NULL,
    description TEXT,
    start_date DATE,
    end_date DATE
);
