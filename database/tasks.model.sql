CREATE TABLE IF NOT EXISTS tasks (
    id SERIAL PRIMARY KEY,
    project_id INTEGER NOT NULL REFERENCES projects (id),
    assigned_to INTEGER REFERENCES users (id),
    task_name VARCHAR(100) NOT NULL,
    description TEXT,
    status VARCHAR(30) DEFAULT 'Pending',
    due_date DATE
);  