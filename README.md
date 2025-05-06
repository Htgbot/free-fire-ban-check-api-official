# free-fire-ban-check-api-official
A lightweight PHP API that checks the ban status of a Free Fire player using their UID. Built to interact with Garena’s official anti-hack system, this tool returns clear JSON responses including ban duration and status. Ideal for use in gaming bots, moderation dashboards, and player verification tools.

# Free Fire UID Ban Check (PHP API)

This PHP script checks whether a Free Fire UID is banned using the official Garena anti-hack API.

## ✅ Features

- Accepts `uid` via GET request
- Queries the Garena ban check API
- Returns JSON with ban status and duration
- Public CORS headers enabled

## 📌 Usage

### Request:

```http
GET /check_ff_status.php?uid=2160560832
GET https://htgapisitedt.x10.mx/Isban.php?uid=12345678
