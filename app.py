try:
    from flask import Flask, render_template, jsonify  # type: ignore[import]
except ImportError as exc:
    raise ImportError(
        "Flask is not installed. Install it with 'pip install flask'."
    ) from exc

app = Flask(__name__)

PROFILE = {
    "name": "Abeil Rafli Adhani",
    "title": "IT Enthusiast",
    "tagline": "I craft fast, beautiful, and scalable web experiences.",
    "bio": "fresh graduates Informatics Engineering.",
    "location": "Bogor, Indonesia",
    "email": "abeilrfl@gmail.com",
    "github": "https://github.com/Unknown7529",
    "linkedin": "https://linkedin.com/in/abeil-rafli",
    "skills": [
        {"category": "Backend", "tags": ["Python", "Flask", "Django", "FastAPI", "PostgreSQL", "Redis"]},
        {"category": "Frontend", "tags": ["JavaScript", "React", "Vue.js", "TypeScript", "HTML5", "CSS3"]},
        {"category": "DevOps", "tags": ["Docker", "Kubernetes", "CI/CD", "AWS", "Nginx", "Linux"]},
        {"category": "Tools", "tags": ["Git", "Figma", "VS Code", "Postman", "Jira", "Notion"]},
    ],
    "projects": [
        {
            "title": "StreamFlow API",
            "description": "High-performance REST API handling 1M+ requests/day for a real-time analytics platform. Built with FastAPI, PostgreSQL, and Redis caching.",
            "tech": ["Python", "FastAPI", "PostgreSQL", "Docker"],
            "color": "#00D4AA"
        },
        {
            "title": "Nexus Dashboard",
            "description": "Real-time operational dashboard with WebSocket connections, interactive charts, and role-based access control for enterprise clients.",
            "tech": ["React", "TypeScript", "D3.js", "Flask"],
            "color": "#7C6AF7"
        },
        {
            "title": "AutoDeploy CLI",
            "description": "A developer tool that automates Docker-based deployments with zero-downtime rolling updates and integrated health checks.",
            "tech": ["Python", "Docker", "Bash", "AWS"],
            "color": "#F97316"
        },
        {
            "title": "LinkSphere",
            "description": "A social bookmarking platform with AI-powered tagging, full-text search, and browser extension integration built for research teams.",
            "tech": ["Django", "Vue.js", "Elasticsearch", "Redis"],
            "color": "#EC4899"
        },
    ],
    "experience": [
        {"year": "2022–Now", "role": "Senior Full-Stack Engineer", "company": "TechNova Inc."},
        {"year": "2020–2022", "role": "Backend Developer", "company": "Startup Labs"},
        {"year": "2019–2020", "role": "Junior Developer", "company": "Digital Agency Co."},
    ]
}

@app.route("/")
def index():
    return render_template("index.html", profile=PROFILE)

@app.route("/api/profile")
def api_profile():
    return jsonify(PROFILE)

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000, debug=False)
