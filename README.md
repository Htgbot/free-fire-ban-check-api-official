# free-fire-ban-check-api-official

A lightweight PHP API that checks the ban status of a Free Fire player using their UID.  
Built to interact with Garena’s official anti-hack system, this tool returns structured JSON responses including ban status, duration, nickname, server, and player level.  
Ideal for use in gaming bots, moderation dashboards, UID verification tools, and automation platforms.

## 🚀 Free Fire UID Ban Check (PHP API)

This PHP script allows you to verify whether a Free Fire UID is banned, using Garena's official antihack API, with extended support for nickname, server, and player info.

## ✅ Features

- Accepts `uid` via GET request
- Queries Garena's anti-hack system
- Returns:
  - Ban status & period
  - Nickname, level, server, and signature (if available)
- JSON formatted responses
- Public CORS headers (for frontend integration)
- Lightweight and easy to host

## 📌 API Usage

### ✅ Sample Request

```
GET https://htgapisitedt.x10.mx/Isban.php?uid=12345678
```

### 📥 Response (✅ Not Banned)

```json
{
  "status": "success",
  "uid": "12345678",
  "server": "SG",
  "nickname": "FB:ㅤ@GMRemyX",
  "level": 67,
  "signature": "FB & YT GM Remy | TikTok :gmremyx | IG GM Remy",
  "is_banned": 0,
  "ban_period": 0,
  "message": "Player is not banned."
}
```

### 🚫 Response (❌ Banned)

```json
{
  "status": "success",
  "uid": "2160560832",
  "server": "SG",
  "nickname": "ᴴᵀᴳシԍᴀмᴇʀ⚫YT",
  "level": 59,
  "signature": "YOU[FF0000]TUBER [38ACEC]Ⓕ[FFFFFF] HARRYTECHGAMING",
  "is_banned": 1,
  "ban_period": 6,
  "message": "Player is banned for 6 Years(s)."
}
```

## 🔧 Deployment

1. Upload `Isban.php` to your PHP-enabled web server
2. Access it like:
   ```
   https://htgapisitedt.x10.mx/Isban.php?uid=12345678
   ```

## 🛡️ License

This project is licensed under the MIT License.
