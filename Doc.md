# 📄 API Documentation

## POST {{base_url}}/api/login

### Description:  Logs in a user and returns an authentication token and user data 

### Query Parameters 

    page (optional): The page number. Default is 1.

### Body (JSON):

    {
        "email"    : "email@xxxx.com",
        "password" : "********"
    }

### Response :

    {
        "data": {
            "token": "Q58UWPUnmL2CAc2Dhe8MaI9TpjqqBKGjXlDvpaWT3a686a9c",
            "user": {
                "id": 1,
                "role_id": 2,
                "name": "Ferdinand Hawkins",
                "email": "tajolyvoh@mailinator.com",
            ....
            }
        }
    }



## POST {{base_url}}/api/attachment/upload/post

### Description: Uploads a file (e.g., video or image) to the server.

### Headers 

    . Content-Type: multipart/form-data
    . Authorization: Bearer YOUR_TOKEN_HERE

### Body:

    | Field | Type | Description                         |
    | ----- | ---- | ----------------------------------- |
    | file  | File | File to upload (video, image, etc.) |


### Response :

    {
        "success": true,
        "attachmentID": "db77bd762afb4cc6aa945cab51b71e86",
        "path": "/storage/posts/videos/db77bd762afb4cc6aa945cab51b71e86.mp4",
        "type": "video",
        "thumbnail": "/storage/posts/videos/thumbnails/db77bd762afb4cc6aa945cab51b71e86.jpg",
        "blurred": false,
        "coconut_id": null,
        "has_thumbnail": null
    }


## POST {{base_url}}/api/posts/save

### Description: Creates and saves a new post, with optional attachments and scheduling

### Headers 

    . Content-Type: multipart/form-data
    . Authorization: Bearer YOUR_TOKEN_HERE

### Body:

    | Field                          | Type   | Description                      |
    | ------------------------------ | ------ | -------------------------------- |
    | attachments\[0]\[attachmentID] | string | Unique ID from uploaded file     |
    | attachments\[0]\[path]         | string | Full path to file                |
    | attachments\[0]\[thumbnail]    | string | Thumbnail path                   |
    | text                           | string | Post content                     |
    | price                          | int    | Optional price                   |
    | postNotifications              | bool   | Notify subscribers               |
    | postReleaseDate                | string | Optional (YYYY-MM-DD HH\:mm\:ss) |
    | postExpireDate                 | string | Optional (YYYY-MM-DD HH\:mm\:ss) |
    | type                           | string | `create` or `edit`               |
    | post\_type                     | int    | Post type identifier             |


### Response :

    {
        "success": "true",
        "message": "Post created."
    }

## GET {{base_url}}/api/get-post

### Description: Retrieves a paginated list of posts including metadata, user info, and attachments..

### Headers 

    . Content-Type: multipart/form-data
    . Authorization: Bearer YOUR_TOKEN_HERE

### Body:

    --

### Response :

    {
        "current_page": 1,
        "data": [
            {
                "id": 4,
                "user_id": 1,
                "text": "test test test",
                "price": 0,
                "status": 1,
                "release_date": "2025-05-15 13:11:30",
                "expire_date": null,
                "is_pinned": 0,
                "post_type": 1,
                "created_at": "2025-05-15T13:11:30.000000Z",
                "updated_at": "2025-05-15T13:11:30.000000Z",
                "tips_count": 0,
                "hasSub": true,
                "isSubbed": true,
                "postPage": 1,
                "user": {
                    "id": 1,
                    "role_id": 2,
                    "name": "Ferdinand Hawkins",
                    "email": "tajolyvoh@mailinator.com",
                    "username": "u1747228533",
                    "referral_code": "60AE6N2M",
                    "bio": null,
                    "birthdate": null,
                    "location": null,
                    "website": null,
                    "avatar": "http://127.0.0.1:8000/img/default-avatar.jpg",
                    "cover": "http://127.0.0.1:8000/img/default-cover.png",
                    "email_verified_at": null,
                    "identity_verified_at": null,
                    "gender_id": null,
                    "gender_pronoun": null,
                    "public_profile": true,
                    "paid_profile": 1,
                    "profile_access_price": 5,
                    "profile_access_price_6_months": 5,
                    "profile_access_price_3_months": 5,
                    "profile_access_price_12_months": 5,
                    "billing_address": null,
                    "first_name": null,
                    "last_name": null,
                    "city": null,
                    "country": null,
                    "state": null,
                    "postcode": null,
                    "auth_provider": null,
                    "auth_provider_id": null,
                    "stripe_account_id": null,
                    "stripe_onboarding_verified": 0,
                    "enable_2fa": 0,
                    "enable_geoblocking": null,
                    "open_profile": 0,
                    "country_id": null,
                    "settings": {
                        "notification_email_new_sub": "true",
                        "notification_email_new_message": "false",
                        "notification_email_expiring_subs": "true",
                        "notification_email_renewals": "false",
                        "notification_email_new_tip": "true",
                        "notification_email_new_comment": "false",
                        "notification_email_new_post_created": "false",
                        "locale": "en",
                        "notification_email_new_ppv_unlock": "true",
                        "notification_email_creator_went_live": "false"
                    },
                    "last_active_at": null,
                    "last_ip": null,
                    "created_at": "2025-05-14T13:15:33.000000Z",
                    "updated_at": "2025-05-14T13:15:33.000000Z"
                },
                "reactions": [],
                "attachments": [
                    {
                        "id": "db77bd762afb4cc6aa945cab51b71e86",
                        "filename": "posts/videos/db77bd762afb4cc6aa945cab51b71e86.mp4",
                        "driver": 0,
                        "type": "mp4",
                        "user_id": 1,
                        "post_id": 4,
                        "message_id": null,
                        "coconut_id": null,
                        "has_thumbnail": null,
                        "has_blurred_preview": null,
                        "created_at": "2025-05-15T13:10:27.000000Z",
                        "updated_at": "2025-05-15T13:11:30.000000Z",
                        "payment_request_id": null,
                        "attachmentType": "video",
                        "path": "/storage/posts/videos/db77bd762afb4cc6aa945cab51b71e86.mp4",
                        "thumbnail": "/storage/posts/videos/thumbnails/db77bd762afb4cc6aa945cab51b71e86.jpg"
                    }
                ],
                "bookmarks": [],
                "post_purchases": []
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/get-post?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/get-post?page=1",
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/get-post?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/get-post",
        "per_page": 3,
        "prev_page_url": null,
        "to": 1,
        "total": 1
    }

# 📬 Messenger API Documentation

## GET {{base_url}}/api/my/messenger

### Description: Fetch initial messenger data including contacts, user info, unseen messages count, and media settings.

### Headers 

    . Authorization: Bearer YOUR_TOKEN_HERE

### Body:

    --

### Response :

    {
        "status": "success",
        "data": {
            "messengerVars": {
                "userAvatarPath": "https://127.0.0.1/uploads/users/avatars/",
                "lastContactID": 2,
                "pusherCluster": "eu",
                "pusherKey": "35ab34689a1cb8877b58",
                "bootFullMessenger": true,
                "lockedMessageSVGPath": "http://127.0.0.1:8000/img/post-locked.svg",
                "minimumPostsLimit": null,
                "availableContacts": [
                    {
                        "id": 2,
                        "name": "Felicia Mckenzie",
                        "avatar": "http://127.0.0.1:8000/img/default-avatar.jpg",
                        "label": "<div><img class=\"searchAvatar\" src=\"uploads/users/avatars/http://127.0.0.1:8000/img/default-avatar.jpg\" alt=\"\"><span class=\"name\">Felicia Mckenzie</span></div>"
                    }
                ],
                "followingContacts": []
            },
            "mediaSettings": {
                "allowed_file_extensions": ".png,.jpg,.jpeg,.wav,.mp3,.ogg,.mp4",
                "max_file_upload_size": 3000,
                "use_chunked_uploads": false,
                "upload_chunk_size": 2
            },
            "user": {
                "username": "u1747228533",
                "user_id": 1,
                "lists": {
                    "blocked": 2,
                    "following": 1
                },
                "billingData": {
                    "first_name": null,
                    "last_name": null,
                    "billing_address": null,
                    "country": null,
                    "city": null,
                    "state": null,
                    "postcode": null,
                    "credit": 55
                }
            },
            "lastContactID": 2,
            "unseenMessages": 5,
            "availableContacts": [
                {
                    "id": 2,
                    "name": "Felicia Mckenzie",
                    "avatar": "http://127.0.0.1:8000/img/default-avatar.jpg",
                    "label": "<div><img class=\"searchAvatar\" src=\"uploads/users/avatars/http://127.0.0.1:8000/img/default-avatar.jpg\" alt=\"\"><span class=\"name\">Felicia Mckenzie</span></div>"
                }
            ]
        }
    }

## GET {{base_url}}/api/my/messenger/fetchMessages/{userID}

### Description: Fetch a paginated list of messages between the authenticated user and a specific user.

### Headers 

    . Content-Type: multipart/form-data
    . Authorization: Bearer YOUR_TOKEN_HERE

### Body:

    --

### Response :
    {
        "status": "success",
        "data": {
            "messages": [
                {
                    "id": 1,
                    "sender_id": 2,
                    "receiver_id": 1,
                    "replyTo": 0,
                    "message": "message test
                    "isSeen": 0,
                    "price": null,
                    "created_at": "2025-05-15T16:10:05.000000Z",
                    "updated_at": "2025-05-15T16:10:05.000000Z",
                    "hasUserUnlockedMessage": false,
                    "sender": {
                        "id": 2,
                        "name": "Felicia Mckenzie",
                        "username": "u1747325199",
                        "avatar": "http://127.0.0.1:8000/img/default-avatar.jpg",
                        "profileUrl": "http://127.0.0.1:8000/u1747325199"
                    },
                    "receiver": {
                        "id": 1,
                        "name": "Ferdinand Hawkins",
                        "username": "u1747228533",
                        "avatar": "http://127.0.0.1:8000/img/default-avatar.jpg",
                        "profileUrl": "http://127.0.0.1:8000/u1747228533"
                    },
                    "attachments": []
                },
                {
                    "id": 2,
                    "sender_id": 2,
                    "receiver_id": 1,
                    "replyTo": 0,
                    "message": "message test",
                    "isSeen": 0,
                    "price": 0,
                    "created_at": "2025-05-15T16:19:50.000000Z",
                    "updated_at": "2025-05-15T16:19:50.000000Z",
                    "hasUserUnlockedMessage": false,
                    "sender": {
                        "id": 2,
                        "name": "Felicia Mckenzie",
                        "username": "u1747325199",
                        "avatar": "http://127.0.0.1:8000/img/default-avatar.jpg",
                        "profileUrl": "http://127.0.0.1:8000/u1747325199"
                    },
                    "receiver": {
                        "id": 1,
                        "name": "Ferdinand Hawkins",
                        "username": "u1747228533",
                        "avatar": "http://127.0.0.1:8000/img/default-avatar.jpg",
                        "profileUrl": "http://127.0.0.1:8000/u1747228533"
                    },
                    "attachments": []
                },
            ]
        }
    }

## GET {{base_url}}/api/my/messenger/sendMessage

### Description: Send a message to one or more users.

### Headers 

    . Authorization: Bearer YOUR_TOKEN_HERE

### Body:

    {
        "message": "message test ",
        "receiverIDs": [
            "2"
        ],
        "price": "0"
    }

### Response :

    {
        "status": "success",
        "data": {
            "message": {
                "id": 9,
                "sender_id": 1,
                "receiver_id": 2,
                "replyTo": 0,
                "message": "message test",
                "isSeen": 0,
                "price": 0,
                "created_at": "2025-05-16T10:00:06.000000Z",
                "updated_at": "2025-05-16T10:00:06.000000Z",
                "hasUserUnlockedMessage": false,
                "sender": {
                    "id": 1,
                    "name": "Ferdinand Hawkins",
                    "username": "u1747228533",
                    "avatar": "http://127.0.0.1:8000/img/default-avatar.jpg",
                    "profileUrl": "http://127.0.0.1:8000/u1747228533"
                },
                "receiver": {
                    "id": 2,
                    "name": "Felicia Mckenzie",
                    "username": "u1747325199",
                    "avatar": "http://127.0.0.1:8000/img/default-avatar.jpg",
                    "profileUrl": "http://127.0.0.1:8000/u1747325199"
                },
                "attachments": []
            }
        },
        "errors": false
    }