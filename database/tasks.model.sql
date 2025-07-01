CREATE TABLE IF NOT EXISTS public.tasks (
    id SERIAL PRIMARY KEY,
    meeting_id UUID NOT NULL REFERENCES public.meeting (id),
    assigned_to UUID REFERENCES public."users" (id),
    task_name VARCHAR(100) NOT NULL,
    description TEXT,
    status VARCHAR(30) DEFAULT 'Pending',
    due_date DATE
);
