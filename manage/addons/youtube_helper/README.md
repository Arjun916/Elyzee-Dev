# YouTube Helper Addon for CouchCMS

This addon provides convenient tags for working with YouTube videos in CouchCMS:

- `<cms:youtube_id />` – Extracts the 11-character video ID  
- `<cms:youtube_url />` – Normalized watch URL (`https://www.youtube.com/watch?v=ID`)  
- `<cms:youtube_embed_url />` – Embed URL (`https://www.youtube.com/embed/ID`)  
- `<cms:youtube_thumbnail />` – Best-available or specific thumbnail (smart/fast modes)  
- `<cms:youtube_iframe />` – Outputs a complete `<iframe>` embed  

---

## Installation

1. Copy the folder:

   ```text
   couch/addons/youtube_helper/
       youtube-helper.php
       youtube-helper.ini
	   placeholder.jpg
       README.md
