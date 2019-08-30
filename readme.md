## Song
- Title
- Songwriter
- Performances (one to many)
- Charts (possibly several)
- Hymnal number (if relevant)

## Playlist
- Date
- SongUse

## SongUse
- Song
- Date

## Musician
- Name
- Email
- Phone
- Skills (Many to Many)

## Skill
- Title
- Description

## MusicianSkills
- Musician
- Skill

## Service
- Date (so SongList)
- Roles (List of Musician/Skills serving that day)
- Prelude (Which Musician is Responsible)
- Offertory (Which Musician)
- Special Music

## Roles
- Date
- MusicianSkills

## Performance
- Song
- Artist
- Link (to Dropbox or S3)
- Key (if known)

## Chart
- Song
- Type (vocal, chords, lyrics, lead)
- Link
- Key
