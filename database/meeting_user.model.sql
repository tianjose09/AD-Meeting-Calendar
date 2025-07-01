CREATE TABLE IF NOT EXISTS public.meeting_users (
    meeting_id UUID NOT NULL REFERENCES public.meeting (id),
    user_id UUID NOT NULL REFERENCES public."users" (id),
    role VARCHAR(50) NOT NULL,
    PRIMARY KEY (meeting_id, user_id)
);
