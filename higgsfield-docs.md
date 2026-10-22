

# https://docs.higgsfield.ai/docs/models/image-generation.md
> ## Documentation Index
> Fetch the complete documentation index at: https://docs.higgsfield.ai/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Image Generation API

> Explore image models and their API request schemas.

Choose from **14 model families** and **17 catalog entries**. Each workflow has its own parameters and examples.

Soul ID is a character-training workflow.

## Models

[HiggsfieldImage · 1 workflow
SOUL
Generate images with selectable styles and adjustable style strength.
View API reference →](/docs/models/soul-standard.md)

[HiggsfieldImage · 1 workflow
SOUL V2
Generate portraits, fashion and editorial images with SOUL styles.
View API reference →](/docs/models/soul-2.md)

[HiggsfieldImage · 1 workflow
SOUL Cinema
Generate cinema-inspired still images from text prompts.
View API reference →](/docs/models/soul-cinema.md)

[HiggsfieldImage · 1 workflow
Soul ID
Train a personal character from reference images for use with compatible SOUL workflows.
View API reference →](/docs/models/soul-id.md)

[HiggsfieldImage · 3 workflows
Marketing Studio Image
Generate and edit campaign images, with optional preset-based prompt enhancement.
View API reference →](/docs/models/marketing-studio-image.md)

[HiggsfieldImage · 1 workflow
Ads Studio
Turn a marketing brief and optional product references into 1–8 ad concepts rendered as images with GPT Image 2.5 Flare.
View API reference →](/docs/models/ads-studio.md)

[xAIImage · 1 workflow
Grok Image 2.0
Generate and edit images with up to ten image references.
View API reference →](/docs/models/grok-image-2.md)

[RecraftImage · 1 workflow
Recraft V4.1
Generate 1K images with RGB palette and background controls.
View API reference →](/docs/models/recraft-v4-1.md)

[RecraftImage · 1 workflow
Recraft V4.1 Pro
Generate 2K images with RGB palette and background controls.
View API reference →](/docs/models/recraft-v4-1-pro.md)

[RecraftImage · 1 workflow
Recraft V4.1 Utility
Generate 1K images with RGB palette and background controls.
View API reference →](/docs/models/recraft-v4-1-utility.md)

[RecraftImage · 1 workflow
Recraft V4.1 Utility Pro
Generate 2K images with RGB palette and background controls.
View API reference →](/docs/models/recraft-v4-1-utility-pro.md)

[AlibabaImage · 2 workflows
Qwen Image 3
Generate images or edit one to three reference images with optional prompt reasoning.
View API reference →](/docs/models/qwen-image-3.md)

[IdeogramImage · 1 workflow
Ideogram 4.0
Generate images with an optional image reference and selectable rendering speed.
View API reference →](/docs/models/ideogram-4.md)

[AlibabaImage · 1 workflow
Z-Image Turbo
Generate images at 1K or 2K with optional prompt enhancement.
View API reference →](/docs/models/z-image-turbo.md)

## Quick start

1. Choose a model and the workflow that matches your inputs.
2. Submit its documented JSON body with your [API credentials](/docs/authentication.md).
3. Follow that workflow’s response instructions to retrieve the result.


## Related topics

- [Model API Reference](/docs/models.md)
- [Video Generation API](/docs/models/video-generation.md)
- [Wan 2.6 — Image to video API](/docs/models/wan-2-6/image-to-video.md)
- [Grok Image 2.0 — Generate and edit API](/docs/models/grok-image-2/generate-and-edit.md)
- [SOUL — Text to image API](/docs/models/soul-standard/generate.md)


This documentation is built and hosted on [Mintlify](https://mintlify.com), a developer documentation platform.


# https://docs.higgsfield.ai/docs/models.md
> ## Documentation Index
> Fetch the complete documentation index at: https://docs.higgsfield.ai/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Model API Reference

> Choose a Higgsfield image or video model and open its API reference or Playground.

Use the Higgsfield API to generate images and videos with leading foundation models through one asynchronous request lifecycle.

## Choose a model category

▶

Video Generation API
Genjutsu, Seedance, Kling, Wan, Happy Horse, Cinema Studio, MiniMax, LTX, PixVerse, and Grok.

↗

[Open](/docs/models/video-generation.md)

◇

Image Generation API
SOUL, Soul ID training, Marketing Studio, Ads Studio, Grok, Recraft, Qwen Image, Ideogram, and Z-Image.

↗

[Open](/docs/models/image-generation.md)

## How the catalog works

The sidebar is organized by output type and model family. Every workflow page includes its request schema, required fields, supported values, examples, and response instructions. Generation endpoints also link to the API Playground.

> [!NOTE]
>
> Endpoint fields vary by model and workflow. Use the exact schema documented on the selected model page.

## Availability

The catalog documents 84 entries: 17 Image and 67 Video. Soul ID is a training workflow. Availability and access can change; check the [API Console](https://console.higgsfield.ai) for your account.


## Related topics

- [Seedance 2.5 — Reference to video API](/docs/models/seedance-2-5/reference-to-video.md)
- [Seedance 2.0 — Reference to video API](/docs/models/seedance-2/reference-to-video.md)
- [Kling O3 — Image reference API](/docs/models/kling-o3/image-reference.md)
- [Kling O3 — Video reference API](/docs/models/kling-o3/video-reference.md)
- [Kling Omni — Image reference API](/docs/models/kling-omni/image-reference.md)


This documentation is built and hosted on [Mintlify](https://mintlify.com), a developer documentation platform.


# https://docs.higgsfield.ai/docs/openapi.json
{
    "info": {
        "title": "Higgsfield API",
        "version": "2.0.0",
        "description": "Submit generation requests and retrieve their status and outputs."
    },
    "servers": [
        {
            "url": "https://api.higgsfield.ai"
        }
    ],
    "x-mcp": {
        "enabled": true
    },
    "paths": {
        "/higgsfield-ai/soul/standard": {
            "post": {
                "requestBody": {
                    "required": true,
                    "content": {
                        "application/json": {
                            "schema": {
                                "type": "object",
                                "properties": {
                                    "prompt": {
                                        "type": "string",
                                        "title": "Prompt"
                                    },
                                    "num_images": {
                                        "type": "integer",
                                        "default": 1,
                                        "maximum": 4,
                                        "minimum": 1
                                    },
                                    "resolution": {
                                        "enum": [
                                            "2K",
                                            "4K"
                                        ],
                                        "default": "2K"
                                    },
                                    "aspect_ratio": {
                                        "enum": [
                                            "1:1",
                                            "4:3",
                                            "3:4",
                                            "3:2",
                                            "2:3",
                                            "5:4",
                                            "4:5",
                                            "16:9",
                                            "9:16",
                                            "21:9"
                                        ],
                                        "type": "string",
                                        "title": "Aspect Ratio",
                                        "default": "4:3"
                                    }
                                },
                                "required": [
                                    "prompt"
                                ]
                            }
                        }
                    }
                },
                "responses": {
                    "200": {
                        "description": "The request status",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/RequestStatus"
                                }
                            }
                        }
                    }
                },
                "operationId": "post_higgsfield_ai_soul_standard",
                "summary": "Create higgsfield-ai soul standard",
                "tags": [
                    "Soul"
                ],
                "description": "Submit an asynchronous generation request to `/higgsfield-ai/soul/standard`. The response includes request metadata for status tracking and cancellation."
            }
        },
        "/requests/{request_id}/status": {
            "get": {
                "summary": "Get request status",
                "operationId": "get_request_status",
                "parameters": [
                    {
                        "name": "request_id",
                        "in": "path",
                        "required": true,
                        "schema": {
                            "type": "string",
                            "format": "uuid",
                            "title": "Request Id"
                        }
                    }
                ],
                "responses": {
                    "200": {
                        "description": "Current request state and output, when available.",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/RequestStatus"
                                }
                            }
                        }
                    },
                    "401": {
                        "description": "Missing or invalid API credentials.",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/ErrorResponse"
                                }
                            }
                        }
                    },
                    "404": {
                        "description": "The request does not exist or belongs to another account.",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/ErrorResponse"
                                }
                            }
                        }
                    }
                },
                "tags": [
                    "Requests"
                ],
                "description": "Retrieve the current state and output of a generation request."
            }
        },
        "/requests/{request_id}/cancel": {
            "post": {
                "summary": "Cancel a queued request",
                "operationId": "cancel_request",
                "parameters": [
                    {
                        "name": "request_id",
                        "in": "path",
                        "required": true,
                        "schema": {
                            "type": "string",
                            "format": "uuid",
                            "title": "Request Id"
                        }
                    }
                ],
                "responses": {
                    "202": {
                        "description": "The request was canceled."
                    },
                    "400": {
                        "description": "The request has already started and can no longer be canceled.",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/ErrorResponse"
                                }
                            }
                        }
                    },
                    "401": {
                        "description": "Missing or invalid API credentials.",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/ErrorResponse"
                                }
                            }
                        }
                    },
                    "404": {
                        "description": "The request does not exist or belongs to another account.",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/ErrorResponse"
                                }
                            }
                        }
                    }
                },
                "tags": [
                    "Requests"
                ],
                "description": "Cancel a request that has not started processing. A successful response has no body."
            }
        },
        "/kling-video/v2.5-turbo/pro/image-to-video": {
            "post": {
                "requestBody": {
                    "required": true,
                    "content": {
                        "application/json": {
                            "schema": {
                                "type": "object",
                                "properties": {
                                    "prompt": {
                                        "type": "string",
                                        "title": "Prompt"
                                    },
                                    "duration": {
                                        "enum": [
                                            5,
                                            10
                                        ],
                                        "type": "integer",
                                        "title": "Duration",
                                        "default": 5
                                    },
                                    "cfg_scale": {
                                        "type": "number",
                                        "title": "CFG Scale",
                                        "default": 0.5,
                                        "maximum": 1,
                                        "minimum": 0,
                                        "multipleOf": 0.01
                                    },
                                    "image_url": {
                                        "type": "string",
                                        "title": "Image URL",
                                        "format": "uri"
                                    },
                                    "negative_prompt": {
                                        "type": "string",
                                        "title": "Negative Prompt",
                                        "default": ""
                                    }
                                },
                                "required": [
                                    "prompt",
                                    "image_url"
                                ]
                            }
                        }
                    }
                },
                "responses": {
                    "200": {
                        "description": "The request status",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/RequestStatus"
                                }
                            }
                        }
                    }
                },
                "operationId": "post_kling_video_v2_5_turbo_pro_image_to_video",
                "summary": "Create kling-video v2.5-turbo pro image-to-video",
                "tags": [
                    "Kling Video"
                ],
                "description": "Submit an asynchronous generation request to `/kling-video/v2.5-turbo/pro/image-to-video`. The response includes request metadata for status tracking and cancellation."
            }
        },
        "/kling-video/v2.5-turbo/pro/text-to-video": {
            "post": {
                "requestBody": {
                    "required": true,
                    "content": {
                        "application/json": {
                            "schema": {
                                "type": "object",
                                "properties": {
                                    "prompt": {
                                        "type": "string",
                                        "title": "Prompt"
                                    },
                                    "duration": {
                                        "enum": [
                                            5,
                                            10
                                        ],
                                        "type": "integer",
                                        "title": "Duration",
                                        "default": 5
                                    },
                                    "cfg_scale": {
                                        "type": "number",
                                        "title": "CFG Scale",
                                        "default": 0.5,
                                        "maximum": 1,
                                        "minimum": 0,
                                        "multipleOf": 0.01
                                    },
                                    "negative_prompt": {
                                        "type": "string",
                                        "title": "Negative Prompt",
                                        "default": ""
                                    }
                                },
                                "required": [
                                    "prompt"
                                ]
                            }
                        }
                    }
                },
                "responses": {
                    "200": {
                        "description": "The request status",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/RequestStatus"
                                }
                            }
                        }
                    }
                },
                "operationId": "post_kling_video_v2_5_turbo_pro_text_to_video",
                "summary": "Create kling-video v2.5-turbo pro text-to-video",
                "tags": [
                    "Kling Video"
                ],
                "description": "Submit an asynchronous generation request to `/kling-video/v2.5-turbo/pro/text-to-video`. The response includes request metadata for status tracking and cancellation."
            }
        },
        "/kling-video/v2.5-turbo/standard/image-to-video": {
            "post": {
                "requestBody": {
                    "required": true,
                    "content": {
                        "application/json": {
                            "schema": {
                                "type": "object",
                                "properties": {
                                    "prompt": {
                                        "type": "string",
                                        "title": "Prompt"
                                    },
                                    "duration": {
                                        "enum": [
                                            5,
                                            10
                                        ],
                                        "type": "integer",
                                        "title": "Duration",
                                        "default": 5
                                    },
                                    "cfg_scale": {
                                        "type": "number",
                                        "title": "CFG Scale",
                                        "default": 0.5,
                                        "maximum": 1,
                                        "minimum": 0,
                                        "multipleOf": 0.01
                                    },
                                    "image_url": {
                                        "type": "string",
                                        "title": "Image URL",
                                        "format": "uri"
                                    },
                                    "negative_prompt": {
                                        "type": "string",
                                        "title": "Negative Prompt",
                                        "default": ""
                                    }
                                },
                                "required": [
                                    "prompt",
                                    "image_url"
                                ]
                            }
                        }
                    }
                },
                "responses": {
                    "200": {
                        "description": "The request status",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/RequestStatus"
                                }
                            }
                        }
                    }
                },
                "operationId": "post_kling_video_v2_5_turbo_standard_image_to_video",
                "summary": "Create kling-video v2.5-turbo standard image-to-video",
                "tags": [
                    "Kling Video"
                ],
                "description": "Submit an asynchronous generation request to `/kling-video/v2.5-turbo/standard/image-to-video`. The response includes request metadata for status tracking and cancellation."
            }
        },
        "/minimax/hailuo-2.3/standard/image-to-video": {
            "post": {
                "requestBody": {
                    "required": true,
                    "content": {
                        "application/json": {
                            "schema": {
                                "type": "object",
                                "properties": {
                                    "prompt": {
                                        "type": "string",
                                        "title": "Prompt"
                                    },
                                    "duration": {
                                        "enum": [
                                            6,
                                            10
                                        ],
                                        "type": "integer",
                                        "title": "Duration",
                                        "default": 6
                                    },
                                    "image_url": {
                                        "type": "string",
                                        "title": "Image URL",
                                        "format": "uri"
                                    },
                                    "prompt_optimizer": {
                                        "type": "boolean",
                                        "title": "Prompt optimizer",
                                        "default": true
                                    }
                                },
                                "required": [
                                    "prompt",
                                    "image_url"
                                ]
                            }
                        }
                    }
                },
                "responses": {
                    "200": {
                        "description": "The request status",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/RequestStatus"
                                }
                            }
                        }
                    }
                },
                "operationId": "post_minimax_hailuo_2_3_standard_image_to_video",
                "summary": "Create minimax hailuo-2.3 standard image-to-video",
                "tags": [
                    "Minimax"
                ],
                "description": "Submit an asynchronous generation request to `/minimax/hailuo-2.3/standard/image-to-video`. The response includes request metadata for status tracking and cancellation."
            }
        },
        "/minimax/hailuo-2.3/standard/text-to-video": {
            "post": {
                "requestBody": {
                    "required": true,
                    "content": {
                        "application/json": {
                            "schema": {
                                "type": "object",
                                "properties": {
                                    "prompt": {
                                        "type": "string",
                                        "title": "Prompt"
                                    },
                                    "duration": {
                                        "enum": [
                                            6,
                                            10
                                        ],
                                        "type": "integer",
                                        "title": "Duration",
                                        "default": 6
                                    },
                                    "prompt_optimizer": {
                                        "type": "boolean",
                                        "title": "Prompt optimizer",
                                        "default": true
                                    }
                                },
                                "required": [
                                    "prompt"
                                ]
                            }
                        }
                    }
                },
                "responses": {
                    "200": {
                        "description": "The request status",
                        "content": {
                            "application/json": {
                                "schema": {
                                    "$ref": "#/components/schemas/RequestStatus"
                                }
                            }
                        }
                    }
                },
                "operationId": "post_minimax_hailuo_2_3_standard_text_to_video",
                "summary": "Create minimax hailuo-2.3 standard text-to-video",
                "tags": [
                    "Minimax"
                ],
                "description": "Submit an asynchronous generation request to `/minimax/hailuo-2.3/standard/text-to-video`. The response includes request metadata for status tracking and cancellation."
            }
        }
    },
    "components": {
        "schemas": {
            "RequestStatus": {
                "title": "Request",
                "type": "object",
                "properties": {
                    "status": {
                        "enum": [
                            "queued",
                            "in_progress",
                            "nsfw",
                            "failed",
                            "completed",
                            "canceled"
                        ],
                        "title": "Status",
                        "type": "string"
                    },
                    "request_id": {
                        "type": "string",
                        "format": "uuid"
                    },
                    "status_url": {
                        "type": "string",
                        "format": "uri"
                    },
                    "cancel_url": {
                        "type": "string",
                        "format": "uri"
                    },
                    "error": {
                        "type": [
                            "string",
                            "null"
                        ]
                    },
                    "images": {
                        "type": "array",
                        "items": {
                            "$ref": "#/components/schemas/MediaOutput"
                        }
                    },
                    "video": {
                        "$ref": "#/components/schemas/MediaOutput"
                    },
                    "audio": {
                        "$ref": "#/components/schemas/MediaOutput"
                    },
                    "audios": {
                        "type": "array",
                        "items": {
                            "$ref": "#/components/schemas/MediaOutput"
                        }
                    }
                },
                "required": [
                    "status",
                    "request_id"
                ]
            },
            "MediaOutput": {
                "title": "Media output",
                "type": "object",
                "additionalProperties": false,
                "properties": {
                    "url": {
                        "type": "string",
                        "format": "uri"
                    }
                },
                "required": [
                    "url"
                ]
            },
            "ErrorResponse": {
                "title": "Error response",
                "type": "object",
                "properties": {
                    "detail": {
                        "type": "string"
                    }
                },
                "required": [
                    "detail"
                ]
            }
        },
        "securitySchemes": {
            "authKey": {
                "type": "apiKey",
                "in": "header",
                "name": "Authorization",
                "description": "Use `Key {api_key_id}:{api_key_secret}`."
            }
        }
    },
    "security": [
        {
            "authKey": []
        }
    ],
    "openapi": "3.1.0"
}



# https://docs.higgsfield.ai/docs/llms.txt
# Higgsfield API Docs

> Integrate Higgsfield image and video generation into applications and agents.

## Model discovery and source priority

- Start at https://console.higgsfield.ai to discover models and open their model-specific API documentation.
- Use the selected model’s documentation for its endpoint, request schema, supported parameters, and examples. Follow its model-specific `llms.txt` link when available.
- Use https://docs.higgsfield.ai/docs/llms.txt for shared authentication, SDK, polling, webhook, and error-handling guidance.
- Treat `/docs/openapi.json` as supplementary reference, not the authoritative model catalog. A model’s absence from that file does not establish that it is unavailable.
- Check whether model documentation targets production or preview. Do not silently substitute environments, endpoints, or models.
- If sources conflict or access prevents verification, describe the specific uncertainty. Distinguish documented availability from access verified with the user’s account.

## Getting started

- [Higgsfield API](https://docs.higgsfield.ai/docs/index.md): Platform overview.
- [Quickstart](https://docs.higgsfield.ai/docs/quickstart.md): First generation walkthrough.
- [Authentication](https://docs.higgsfield.ai/docs/authentication.md): Credentials and secure API access.
- [How the API works](https://docs.higgsfield.ai/docs/how-to/introduction.md): Shared generation workflow.

## Request lifecycle and media

- [Requests and lifecycle](https://docs.higgsfield.ai/docs/concepts/requests.md): Request identifiers, states, and outputs.
- [Polling](https://docs.higgsfield.ai/docs/concepts/polling.md): Status checks and backoff.
- [Webhooks](https://docs.higgsfield.ai/docs/how-to/webhooks.md): Completion notifications and delivery handling.
- [File uploads](https://docs.higgsfield.ai/docs/concepts/file-uploads.md): Preparing input media.
- [Errors and retries](https://docs.higgsfield.ai/docs/concepts/errors.md): Failure handling and retry decisions.
- [Rate limits](https://docs.higgsfield.ai/docs/concepts/rate-limits.md): Account and model limits.
- [Billing and retention](https://docs.higgsfield.ai/docs/concepts/billing-and-retention.md): Charges and output availability.

## SDKs

- [Client libraries](https://docs.higgsfield.ai/docs/how-to/sdk.md): Official Python and TypeScript clients.

## Organizations

- [Organizations](https://docs.higgsfield.ai/docs/organizations.md): Organization setup and collaboration.
- [Managing members](https://docs.higgsfield.ai/docs/organizations/managing-members.md): Membership and access management.

## Shared API reference

- [API reference](https://docs.higgsfield.ai/docs/api-reference/overview.md): API reference overview.
- [Get request status](https://docs.higgsfield.ai/docs/api-reference/requests/get-request-status.md): Check a submitted request.
- [Cancel a queued request](https://docs.higgsfield.ai/docs/api-reference/requests/cancel-a-queued-request.md): Cancel eligible pending work.

## Help

- [FAQ](https://docs.higgsfield.ai/docs/help/faq.md): Common integration questions.
- [Support](https://docs.higgsfield.ai/docs/help/support.md): Contact and troubleshooting resources.

## Supplementary OpenAPI specification

- [OpenAPI specification](https://docs.higgsfield.ai/docs/openapi.json): Supplementary machine-readable reference. Apply the model discovery and source priority guidance above.



# https://docs.higgsfield.ai/llms-full.txt
# API reference
Source: https://docs.higgsfield.ai/docs/api-reference/overview

Reference for Higgsfield image and video generation operations, request status, and cancellation.

The API reference is generated from the public OpenAPI specification. It includes model-specific generation schemas plus the shared status and cancellation operations.

**Base URL:** `https://api.higgsfield.ai`

All endpoints require the [`Authorization` header](/docs/authentication). Generation submissions also accept an optional [`Idempotency-Key`](/docs/concepts/idempotency) for safe retries.

Use the generation endpoint available to your account. Use **Get request status** in the sidebar to retrieve state and output for an existing request. Use **Cancel a queued request** to stop work that has not started processing.

For the complete integration flow, start with the [Quickstart](/docs/quickstart) and [Requests and lifecycle](/docs/concepts/requests).


# Cancel a queued request
Source: https://docs.higgsfield.ai/docs/api-reference/requests/cancel-a-queued-request

/openapi.json post /requests/{request_id}/cancel
Cancel a request that has not started processing. A successful response has no body.



# Get request status
Source: https://docs.higgsfield.ai/docs/api-reference/requests/get-request-status

/openapi.json get /requests/{request_id}/status
Retrieve the current state and output of a generation request.



# Authentication
Source: https://docs.higgsfield.ai/docs/authentication

Authenticate server-side API requests with your Higgsfield key and secret.

Create and manage API credentials in [Higgsfield Console](https://console.higgsfield.ai). Each credential consists of a key ID and a secret.

## Authorization header

Send both values in the `Authorization` header:

```http theme={"theme":{"light":"github-light","dark":"github-dark"}}
Authorization: Key YOUR_KEY_ID:YOUR_KEY_SECRET
```

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl https://api.higgsfield.ai/requests/REQUEST_ID/status \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

The API also accepts the legacy `hf-api-key` and `hf-secret` headers. New integrations should use the `Authorization` header.

## Keep credentials server-side

> [!WARNING]
>
> Do not call the API directly from browser or mobile application code. Anyone who can inspect the application can extract its API secret and use your account.

* Store credentials in a secrets manager or encrypted environment variables.
* Use separate credentials for development and production.
* Never include credentials in URLs, logs, screenshots, or support messages.
* Rotate a credential immediately if it may have been exposed.

## Authentication errors

Missing, malformed, or invalid credentials return `401 Unauthorized`:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "detail": "Invalid credentials"
}
```

Authentication identifies the account, but individual models may have separate access restrictions. A model unavailable to the authenticated account can return `404`, `423`, or `503` depending on its operational state.


# Billing and retention
Source: https://docs.higgsfield.ai/docs/concepts/billing-and-retention

Understand charging, refunds, estimation, and output retention.

Higgsfield charges successful generation requests using account credits. The exact cost depends on the selected model and parameters.

## Credit expiration

Credits expire one year after they are added to your account balance. Plan purchases and usage with this expiration period in mind.

## Estimate a request

Use the estimate endpoint with the same model parameters before submitting generation:

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/estimate/higgsfield-ai/soul/v2/standard \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{
    "prompt": "Editorial portrait in soft daylight"
  }'
```

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "credits": "1.500",
  "usd": "0.094"
}
```

> [!NOTE]
>
> The values above illustrate the response format. Use the estimate returned for your authenticated account as the authoritative amount.

## Failed and moderated requests

Requests ending as `failed` or `nsfw` are not charged. If credits were reserved when the request was accepted, they are refunded automatically.

## Canceled requests

A request can be canceled only before processing starts. A successfully canceled queued request is refunded.

## Output retention

Generated output is accessible for at least seven days after creation and may be removed after that period. Download completed files to your own storage for long-term retention.


# Errors and retries
Source: https://docs.higgsfield.ai/docs/concepts/errors

Handle synchronous API errors and terminal generation failures.

Errors can occur before a request is accepted or later during generation.

## Synchronous errors

Most HTTP errors use the FastAPI error envelope:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "detail": "Invalid credentials"
}
```

Validation errors may return a list in `detail`. Do not parse human-readable messages to make permanent business decisions.

| Status | Typical meaning | Retry? |
| - | - | :-: |
| `400` | Invalid parameters or rejected input | After correcting the request |
| `401` | Missing or invalid credentials | No |
| `403` | Insufficient credits | After funding the account |
| `404` | Request or model not found for this account | No |
| `422` | Request validation failed or an idempotency key was reused with different parameters | No |
| `423` | Model is temporarily blocked | Later |
| `429` | Endpoint limit reached; see [Rate limits](/docs/concepts/rate-limits) | After `Retry-After` |
| `500` | Unexpected server error | Yes, with backoff |
| `503` | Model is disabled or not ready | Later |

## Terminal failures

An accepted request can later finish with `failed` or `nsfw`:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "failed",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "error": "Generation failed"
}
```

Failed and NSFW requests are not charged; any reserved credits are refunded.

## Safe retry policy

* Retry `GET` status requests after network failures and `5xx` responses.
* Do not retry authentication or validation failures without changing the request.
* Use exponential backoff with jitter.
* Set maximum attempts and a total retry deadline.
* Send an [`Idempotency-Key`](/docs/concepts/idempotency) with every generation submission.
* After an ambiguous timeout, network failure, or `5xx`, repeat the same generation request with the same idempotency key.

Every API response includes an `X-Correlation-ID` header. Record it with the `request_id` and include both when contacting support.


# File uploads
Source: https://docs.higgsfield.ai/docs/concepts/file-uploads

Upload images, video, or audio for use as model input.

Use a presigned upload URL when your input media is not already available through a public HTTPS URL.

## 1. Create an upload URL

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
UPLOAD=$(curl --silent --show-error --fail-with-body \
  --request POST \
  --url https://api.higgsfield.ai/files/generate-upload-url \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{"content_type":"image/jpeg"}')

echo "$UPLOAD" | jq
```

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "public_url": "https://cdn.example.com/input/example.jpeg",
  "upload_url": "https://storage.example.com/presigned-upload-url",
  "content_type": "image/jpeg",
  "upload_headers": {
    "Content-Type": "image/jpeg",
    "x-amz-tagging": "retention=temporary"
  }
}
```

The upload URL expires after one hour.

## 2. Upload the file

Send the file to `upload_url` with every header returned in `upload_headers`.

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request PUT \
  --url "$(echo "$UPLOAD" | jq --raw-output '.upload_url')" \
  --header "Content-Type: $(echo "$UPLOAD" | jq --raw-output '.upload_headers["Content-Type"]')" \
  --header "x-amz-tagging: $(echo "$UPLOAD" | jq --raw-output '.upload_headers["x-amz-tagging"]')" \
  --upload-file ./input.jpg
```

Do not send Higgsfield API credentials to the presigned storage URL.

## 3. Use the public URL

Pass `public_url` in the model parameter that accepts an input URL, such as `image_url`, `video_url`, or `audio_url`.

## Supported content types

* `image/jpeg`, `image/jpg`, `image/png`, `image/webp`, `image/gif`
* `audio/wav`, `audio/x-wav`
* `video/mp4`

The content type used for the upload must match the value used to create the presigned URL.


# Idempotent requests
Source: https://docs.higgsfield.ai/docs/concepts/idempotency

Retry generation submissions safely without creating duplicate requests.

Generation submissions accept an optional `Idempotency-Key` header. Use it when a network failure or timeout leaves you unsure whether a request was accepted.

Generate one unique key for each intended generation and keep it until you receive the initial response:

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
export IDEMPOTENCY_KEY=$(uuidgen | tr '[:upper:]' '[:lower:]')

curl --request POST \
  --url https://api.higgsfield.ai/higgsfield-ai/soul/v2/standard \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
    "prompt": "A quiet alpine lake at sunrise, editorial photography"
  }'
```

If the response is lost, repeat the same request with the same key. Higgsfield returns the original `request_id` without creating or charging for another generation.

## Key rules

* Keys must contain 1–255 visible ASCII characters without whitespace. UUIDs are recommended.
* A key identifies one generation intent within your account. API key rotation does not change that identity.
* Reuse the key only when the endpoint, JSON body, and webhook are unchanged.
* JSON object field order does not matter. Array order, omitted fields, explicit `null` values, and different URLs do matter.
* A completed, failed, NSFW, or canceled request keeps its identity. Retrying does not restart it.
* A request rejected before acceptance, such as an authentication or validation failure, does not consume the key.

> [!WARNING]
>
> Create a new key when you deliberately want a new generation, even if its parameters are identical to an earlier request.

## Parameter mismatch

Reusing a key with different request parameters returns `422 Unprocessable Entity`:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "detail": "Idempotency-Key was already used with different request parameters"
}
```

Do not handle this response by generating a new key automatically. First determine whether the changed request represents a deliberate new generation or a client bug.

## Retry after an ambiguous failure

1. Create the key before sending the generation request.
2. Store the key with your local operation or job record.
3. After a network error, timeout, or `5xx`, retry the same endpoint and parameters with the same key.
4. Store the returned `request_id` and use its `status_url` for subsequent checks.

The replay response is an acceptance receipt and can contain `"status": "queued"` even when the original request has already finished. Read `status_url` for its current status and output.

Idempotency keys apply to generation submission endpoints in the Model API reference. Status polling, cancellation, uploads, estimates, and webhook deliveries use their existing retry behavior.


# Polling
Source: https://docs.higgsfield.ai/docs/concepts/polling

Poll request status without creating unnecessary load or duplicate generations.

Poll the `status_url` returned by the submission response until the request reaches a terminal state.

## Recommended strategy

1. Start with a two-second interval.
2. Increase the interval gradually up to ten seconds.
3. Add random jitter when many workers poll concurrently.
4. Stop on `completed`, `failed`, `nsfw`, or `canceled`.
5. Set an application-level timeout appropriate for the selected model.

```python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import random
import time

import httpx

terminal_statuses = {"completed", "failed", "nsfw", "canceled"}
delay = 2.0

while True:
    response = httpx.get(
        status_url,
        headers={"Authorization": f"Key {key_id}:{key_secret}"},
        timeout=30,
    )
    response.raise_for_status()
    result = response.json()

    if result["status"] in terminal_statuses:
        break

    time.sleep(delay + random.uniform(0, 0.5))
    delay = min(delay * 1.5, 10.0)
```

## Retry decisions

| Response | Recommended action |
| - | - |
| `200` with a non-terminal status | Continue polling with backoff. |
| `401` | Stop and fix the credentials. |
| `404` | Stop and verify the request ID and account. |
| `5xx` or network failure | Retry the status request with exponential backoff. |

For long-running production workloads, use [webhooks](/docs/how-to/webhooks) and keep polling as a recovery path.


# Rate limits
Source: https://docs.higgsfield.ai/docs/concepts/rate-limits

Design integrations for account and model concurrency limits.

Rate limits depend on the account and the selected model. View the limits assigned to your account in [Higgsfield Console](https://console.higgsfield.ai).

The primary generation limit is concurrency: the number of requests that may be processing at the same time. Some models can also have model-specific limits.

## When concurrency is reached

Generation requests above your concurrency limit are still accepted. The API returns a `request_id` with status `queued`, and the request starts automatically when one of your running requests reaches a terminal status.

## Endpoint-specific limits

Some non-generation endpoints reject requests above their limit instead of queuing them. They return `429 Too Many Requests` with a `Retry-After` header:

| Endpoint | Limit |
| - | - |
| `POST /v1/custom-references` | Number of Soul ID references training at the same time |

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "detail": "Maximum number of concurrent requests (2) has been reached"
}
```

## Client recommendations

* On `429`, wait for the number of seconds in `Retry-After` before submitting again.
* Limit generation submissions with a worker pool or semaphore so the queue stays short.
* Track each accepted `request_id` until it becomes terminal.
* Use backoff and jitter instead of retrying in a tight loop.
* Keep polling traffic separate from generation submission concurrency.
* Let us know in [Discord](https://discord.gg/BEea92KeR9) before a planned traffic increase if you need higher limits.

> [!NOTE]
>
> Successful responses do not yet include rate-limit headers with your remaining capacity. Treat the limits shown in your dashboard as the authoritative values for your account.


# Requests and lifecycle
Source: https://docs.higgsfield.ai/docs/concepts/requests

Understand asynchronous generation requests and their terminal states.

Generation is asynchronous. A successful submission creates a request and returns immediately while the work continues in the background.

## Request lifecycle

| Status | Terminal | Meaning |
| - | :-: | - |
| `queued` | No | The request is waiting to start and may still be canceled. |
| `in_progress` | No | Generation has started and can no longer be canceled. |
| `completed` | Yes | Output URLs are available in the response. |
| `failed` | Yes | Generation failed. The response may include an `error`. |
| `nsfw` | Yes | Input or output was rejected by content moderation. |
| `canceled` | Yes | The request was canceled before processing started. |

Store the `request_id` as soon as a request is accepted. It is the stable identifier used by polling, cancellation, webhook deduplication, and support.

> [!TIP]
>
> Send an [`Idempotency-Key`](/docs/concepts/idempotency) with generation submissions so an ambiguous timeout can be retried without creating a duplicate request.

## Initial response

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "status_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/status",
  "cancel_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/cancel"
}
```

Use the URLs from the response instead of constructing them manually.

## Completed output

The output field depends on the model's output type.

```json Image theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "images": [
    { "url": "https://cdn.example.com/image-1.jpg" },
    { "url": "https://cdn.example.com/image-2.jpg" }
  ]
}
```

```json Video theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "video": {
    "url": "https://cdn.example.com/video.mp4"
  }
}
```

```json Audio theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "audio": {
    "url": "https://cdn.example.com/audio.mp3"
  },
  "audios": [
    { "url": "https://cdn.example.com/audio.mp3" }
  ]
}
```

Some video and 3D operations can return additional artifacts such as `zip`, `mov`, `jsx`, `fbx`, or `ply`.

## Cancel a request

Cancellation is available only while every job in the request remains queued.

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url "https://api.higgsfield.ai/requests/${REQUEST_ID}/cancel" \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

A successful cancellation returns `202 Accepted` with an empty body. If processing has started, the API returns `400 Bad Request`.

> [!NOTE]
>
> Output URLs are retained for at least seven days. Copy completed media to your own storage if you need it for longer.


# FAQ
Source: https://docs.higgsfield.ai/docs/help/faq

Answers about Higgsfield API authentication, asynchronous requests, model selection, billing, limits, and output retention.

# Frequently Asked Questions

> **What base URL and authentication header should I use?**
>
> Send requests to `https://api.higgsfield.ai` and authenticate server-side with `Authorization: Key YOUR_KEY_ID:YOUR_KEY_SECRET`. Do not use a Bearer token or expose the secret in browser or mobile code. See [Authentication](/docs/authentication).

> **Why does a generation request not return the media immediately?**
>
> Generation is asynchronous. A successful submission returns `request_id`, `status_url`, and `cancel_url`. Poll `status_url` or configure a webhook, then read the output URL after the status becomes `completed`. See [Requests and lifecycle](/docs/concepts/requests).

> **Which model or endpoint should I use?**
>
> Choose by input and output workflow: text-to-image, image editing, text-to-video, image-to-video, or frame-controlled video. Model availability depends on your account. Not sure which endpoint fits your case? Ask in our [Discord](https://discord.gg/BEea92KeR9).

> **What is the retention policy for generated output files?**
>
> Generated output files are stored and accessible for a minimum of 7 days from the time of creation. We strongly recommend downloading and storing files in your own infrastructure for long-term retention. Files may be removed from our servers at any time after the 7-day retention period.

> **Are failed requests charged?**
>
> No. Failed generation requests are not charged to your account. You are only billed for successful completions. In the event of a failure, any credits or costs associated with that request are automatically refunded.

> **What does NSFW status mean?**
>
> NSFW (Not Safe For Work) indicates that either your input parameters or the generated output did not pass our content moderation system due to content policy violations. Content policy rules and restrictions may vary depending on the specific model being used.

> **Are NSFW-flagged requests charged?**
>
> No. Requests flagged as NSFW are not charged to your account. When content is rejected by our moderation system, any associated credits or costs are automatically refunded.

> **Do you offer invoice-based billing?**
>
> The API runs on pay-as-you-go by default: you top up a balance and pay per generation. Invoice-based billing is available for customers on a committed-use contract. To discuss one, [contact sales](https://open.higgsfield.ai/contact-sales).

> **What are the API rate limits?**
>
> Rate limits depend on your account and the selected model. You can view your current limits and usage in your [dashboard](https://console.higgsfield.ai). Need a higher limit? Let us know in our [Discord](https://discord.gg/BEea92KeR9).

> **How do I monitor my API usage?**
>
> You can monitor your API usage, credit consumption, and request history through the [Higgsfield Console dashboard](https://console.higgsfield.ai). The dashboard provides real-time analytics and detailed usage reports.

> **Which programming languages are supported?**
>
> We provide official Python and Node.js/TypeScript SDKs. You can also integrate directly through the REST API from any language with an HTTP client. See [Client libraries](/docs/how-to/sdk).

> **How do I get started with the API?**
>
> To get started:
>
> 1. Create an account at [console.higgsfield.ai](https://console.higgsfield.ai)
>
> 2. Generate your API credentials from the dashboard
>
> 3. Follow our [Quickstart](/docs/quickstart) for your first integration
>
> 4. Read [How the API works](/docs/how-to/introduction), then use a generation endpoint available to your account

> **What happens if a generation takes too long?**
>
> Generation requests have model-specific timeout limits. If a request exceeds the timeout, it will be marked as failed and you will not be charged. You can resubmit the request. If timeouts keep happening, reach out in our [Discord](https://discord.gg/BEea92KeR9) with your `request_id`.

## Still have questions?

If you didn't find your answer, here is where to go next:

* **Discord community**: [Join the Higgsfield Discord](https://discord.gg/BEea92KeR9) and ask your question there
* **Account and billing**: email [support@higgsfield.ai](mailto:support@higgsfield.ai)
* **Documentation**: [Read the Quickstart](/docs/quickstart)
* **API Reference**: [Request endpoint reference](/docs/api-reference/overview)


# Support
Source: https://docs.higgsfield.ai/docs/help/support

Get help with the Higgsfield API

Need help with the Higgsfield API? The Higgsfield team and the developer community are on Discord.

## Contact us

The fastest way to get help is our Discord server:

> **[Join the Higgsfield Discord](https://discord.gg/BEea92KeR9)**
>
> Ask in the Discord community. The Higgsfield team and other developers are there to help.

We can help with:

* Technical issues and troubleshooting
* API integration questions
* Choosing a model or endpoint
* Feature requests and feedback

For account, billing, or invoice questions, email [support@higgsfield.ai](mailto:support@higgsfield.ai) and the team will follow up with you directly.

### Before you post

* Check [status.higgsfield.ai](https://status.higgsfield.ai) for ongoing incidents
* Include the `request_id` and the `X-Correlation-ID` response header of the failing request (see [Errors and retries](/docs/concepts/errors))
* Include the model or endpoint and the time of the request (UTC)

> [!WARNING]
>
> Never share your API key secret, payment details, or personal data in public channels. If we need account details, a team member will continue with you in a private message.

## Documentation

Before reaching out, check the documentation:

> **[Quick Start](/docs/quickstart)**
>
> Get started with the Higgsfield API in minutes

> **[API Reference](/docs/api-reference/overview)**
>
> Complete API endpoint documentation

> **[Client Libraries](/docs/how-to/sdk)**
>
> Official SDKs for Python and TypeScript

> **[Request lifecycle](/docs/concepts/requests)**
>
> Understand asynchronous requests and results

## Resources

### API Dashboard

Manage your API keys, monitor usage, and view analytics at [console.higgsfield.ai](https://console.higgsfield.ai)

### Status Page

Check the current status of Higgsfield services and view incident history at our status page: [status.higgsfield.ai](https://status.higgsfield.ai)

### GitHub

* **Python SDK**: [higgsfield-ai/higgsfield-client](https://github.com/higgsfield-ai/higgsfield-client)
* **TypeScript SDK**: [higgsfield-ai/higgsfield-js](https://github.com/higgsfield-ai/higgsfield-js)
* Found a bug in an SDK? Open an issue in its repository. For everything else, reach out in [Discord](https://discord.gg/BEea92KeR9).

## Feedback

We read all feedback. Let us know how we can improve:

* Share ideas and suggestions in the [Discord community](https://discord.gg/BEea92KeR9)
* Report SDK bugs on [GitHub](https://github.com/higgsfield-ai/higgsfield-client)

***

**Need a quick answer?** Ask in [Discord](https://discord.gg/BEea92KeR9) or start with the [Quickstart](/docs/quickstart).


# How the API works
Source: https://docs.higgsfield.ai/docs/how-to/introduction

Learn the common authentication and asynchronous request lifecycle shared by Higgsfield image and video models.

The Higgsfield API uses an asynchronous request lifecycle:

1. Submit JSON parameters to a model endpoint.
2. Store the returned `request_id`.
3. Poll `status_url` or wait for a webhook.
4. Download output when the request becomes `completed`.

> **[Start with the Quickstart](/docs/quickstart)**
>
> Run a complete request using cURL.

> **[Understand requests](/docs/concepts/requests)**
>
> Learn statuses, output shapes, cancellation, and retention.

**Base URL:** `https://api.higgsfield.ai`

Every request requires server-side [authentication](/docs/authentication). For production integrations, read the [polling](/docs/concepts/polling), [webhook](/docs/how-to/webhooks), and [error handling](/docs/concepts/errors) guides.


# Client libraries
Source: https://docs.higgsfield.ai/docs/how-to/sdk

Use the official Python and TypeScript SDKs.

Official SDKs handle authentication, submission, polling, cancellation, and file uploads. Use them only in trusted server-side environments.

> **[Python](https://github.com/higgsfield-ai/higgsfield-client)**
>
> Synchronous and asynchronous APIs for Python 3.8+.

> **[Node.js and TypeScript](https://github.com/higgsfield-ai/higgsfield-js)**
>
> Typed server-side client with automatic polling and retries.

## Python

### Install

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
pip install higgsfield-client
```

### Configure credentials

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
export HF_KEY="your-api-key-id:your-api-key-secret"
```

### Submit and wait

```python Synchronous theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

result = higgsfield_client.subscribe(
    "higgsfield-ai/soul/v2/standard",
    arguments={
        "prompt": "Editorial portrait in soft daylight",
    },
)

print(result["images"][0]["url"])
```

```python Asynchronous theme={"theme":{"light":"github-light","dark":"github-dark"}}
import asyncio

import higgsfield_client


async def main():
    result = await higgsfield_client.subscribe_async(
        "higgsfield-ai/soul/v2/standard",
        arguments={
            "prompt": "Editorial portrait in soft daylight",
        },
    )
    print(result["images"][0]["url"])


asyncio.run(main())
```

Use `submit` or `submit_async` when you need a request controller for explicit polling, status checks, or cancellation. The Python SDK also provides `upload`, `upload_file`, and `upload_image` helpers.

## Node.js and TypeScript

### Install

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
npm install @higgsfield/client
```

### Configure credentials

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
export HF_CREDENTIALS="your-api-key-id:your-api-key-secret"
```

### Submit and wait

```typescript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({
  credentials: process.env.HF_CREDENTIALS,
});

const result = await higgsfield.subscribe(
  "higgsfield-ai/soul/v2/standard",
  {
    input: {
      prompt: "Editorial portrait in soft daylight",
    },
    withPolling: true,
  },
);

if (result.status === "completed") {
  console.log(result.images?.[0]?.url);
}
```

The v2 TypeScript client is server-side only and blocks browser use to prevent credential exposure.

## Choose an integration style

| Requirement | Recommended API |
| - | - |
| Script or prototype | `subscribe` / `subscribe_async` |
| Worker with explicit lifecycle control | `submit` / `submit_async` |
| Existing request ID | `status`, `result`, or `cancel` |
| Production event-driven integration | Submit with a webhook and keep status polling as recovery |

See the [Python SDK repository](https://github.com/higgsfield-ai/higgsfield-client) and [TypeScript SDK repository](https://github.com/higgsfield-ai/higgsfield-js) for the complete client APIs.


# Webhooks
Source: https://docs.higgsfield.ai/docs/how-to/webhooks

Receive terminal generation results without continuous polling.

Pass an HTTPS endpoint in the `hf_webhook` query parameter when submitting generation. Higgsfield sends one or more HTTP `POST` deliveries after the request reaches `completed`, `failed`, or `nsfw`.

## Configure a webhook

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url "https://api.higgsfield.ai/higgsfield-ai/soul/v2/standard?hf_webhook=https%3A%2F%2Fexample.com%2Fwebhooks%2Fhiggsfield" \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{
    "prompt": "Editorial portrait in soft daylight"
  }'
```

Your endpoint must be publicly reachable over HTTPS, accept a JSON request body, and respond within ten seconds.

## Payload envelope

All deliveries use the same top-level envelope. Successful output is nested in `payload`.

```json Completed image theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "request_id": "9417a243-e457-4075-895b-b68f3cda5303",
  "status": "completed",
  "error": null,
  "payload": {
    "images": [
      {
        "url": "https://cdn.example.com/generated-image.jpg",
        "content_type": "image/jpeg"
      }
    ]
  }
}
```

```json Completed video theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "request_id": "9417a243-e457-4075-895b-b68f3cda5303",
  "status": "completed",
  "error": null,
  "payload": {
    "video": {
      "url": "https://cdn.example.com/generated-video.mp4",
      "content_type": "video/mp4"
    }
  }
}
```

```json Failed theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "request_id": "9417a243-e457-4075-895b-b68f3cda5303",
  "status": "failed",
  "error": "Generation failed",
  "payload": null
}
```

```json NSFW theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "request_id": "9417a243-e457-4075-895b-b68f3cda5303",
  "status": "nsfw",
  "error": null,
  "payload": null
}
```

Audio responses contain `payload.audio`. Some video and 3D operations can also include `zip`, `mov`, `jsx`, `fbx`, or `ply` artifacts.

## Delivery and retries

* Return any `2xx` response after durably recording the event.
* Network failures and `5xx` responses are retried for up to two hours.
* `4xx` responses are treated as permanent and are not retried.
* Duplicate deliveries are possible. Deduplicate by `request_id` and terminal `status`.
* If delivery fails permanently, retrieve the result through the authenticated status endpoint.

Reject request bodies that do not match the documented envelope, but acknowledge valid duplicate deliveries with `2xx`.


# Higgsfield API
Source: https://docs.higgsfield.ai/docs/index

Generate images and videos through one authenticated, asynchronous API.

Higgsfield provides one integration point for generative media models. Submit a request to a model endpoint, then poll for the result or receive a webhook when processing finishes.

> **[Run your first request](/docs/quickstart)**
>
> Create credentials and complete a generation from submission to result.

> **[Get an API key](https://console.higgsfield.ai)**
>
> Create and manage server-side credentials in Higgsfield Console.

## Make a request

Every model uses the same authentication and asynchronous request lifecycle. The JSON body depends on the selected model.

Start with [Genjutsu motion transfer](/docs/models/genjutsu/motion-transfer). Replace the example media URLs with publicly accessible URLs for your own video and reference image. The source video must be at least 4 seconds long.

```bash Genjutsu theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/genjutsu/motion-transfer/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{
    "video_url": "https://example.com/input.mp4",
    "image_urls": ["https://example.com/input.jpg"]
  }'
```

```bash SOUL V2 theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield-ai/soul/v2/standard \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{
    "prompt": "Editorial portrait in soft daylight"
  }'
```

The API immediately returns a request identifier and links for checking or canceling the request.

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "status_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/status",
  "cancel_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/cancel"
}
```

## Choose your path

> **[Build a prototype](/docs/how-to/sdk)**
>
> Use the Python or TypeScript SDK to submit a request and wait for its result.

> **[Ship to production](/docs/concepts/requests)**
>
> Learn the request lifecycle, polling, webhooks, errors, and limits.

> **[Upload media](/docs/concepts/file-uploads)**
>
> Upload input files to Higgsfield storage before generation.

> [!NOTE]
>
> Output files are available for at least seven days. Download completed output to your own storage for long-term retention.


# Model API Reference
Source: https://docs.higgsfield.ai/docs/models

Choose a Higgsfield image or video model and open its API reference or Playground.

Use the Higgsfield API to generate images and videos with leading foundation models through one asynchronous request lifecycle.

## Choose a model category

▶

Video Generation API
Genjutsu, Seedance, Kling, Wan, Happy Horse, Cinema Studio, MiniMax, LTX, PixVerse, and Grok.

↗

[Open](/docs/models/video-generation)

◇

Image Generation API
SOUL, Soul ID training, Marketing Studio, Ads Studio, Grok, Recraft, Qwen Image, Ideogram, and Z-Image.

↗

[Open](/docs/models/image-generation)

## How the catalog works

The sidebar is organized by output type and model family. Every workflow page includes its request schema, required fields, supported values, examples, and response instructions. Generation endpoints also link to the API Playground.

> [!NOTE]
>
> Endpoint fields vary by model and workflow. Use the exact schema documented on the selected model page.

## Availability

The catalog documents 84 entries: 17 Image and 67 Video. Soul ID is a training workflow. Availability and access can change; check the [API Console](https://console.higgsfield.ai) for your account.


# Ads Studio API
Source: https://docs.higgsfield.ai/docs/models/ads-studio

Turn a marketing brief and optional product references into 1–8 ad concepts rendered as images with GPT Image 2.5 Flare.

Turn a marketing brief and optional product references into 1–8 ad concepts rendered as images with GPT Image 2.5 Flare.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Generate ads](/docs/models/ads-studio/generate) | `POST /higgsfield/ads-studio/v1.0` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Ads Studio — Generate ads API
Source: https://docs.higgsfield.ai/docs/models/ads-studio/generate

Generate ads with Ads Studio: request parameters, examples and response handling.

[← Ads Studio](/docs/models/ads-studio)

**Endpoint:** `POST https://api.higgsfield.ai/higgsfield/ads-studio/v1.0`

**Endpoint ID:** `higgsfield/ads-studio/v1.0`

[▶
Open API PlaygroundAds Studio · Generate ads
↗](https://console.higgsfield.ai/models/higgsfield%2Fads-studio%2Fv1.0/playground)

## Usage notes

* Submit one request with your brief. Ad concepts are prepared automatically, then rendered as images; no separate preparation or generate call is required.
* batch\_size selects 1–8 ad concepts. Each concept produces one image, so a fully successful batch returns batch\_size images.
* Rendering uses GPT Image 2.5 Flare with fixed 2k resolution and high quality. Exact dimensions depend on aspect\_ratio. quality, resolution, renderer and fallback model are not public inputs.
* All outputs in a batch use the requested aspect\_ratio. Omitting it selects 1:1. The value auto is not supported.
* Set HF\_API\_KEY\_ID and HF\_API\_KEY\_SECRET to your API credentials. Set a unique IDEMPOTENCY\_KEY for each intended generation; reuse it only when retrying that same request.

## Quick start

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/ads-studio/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "Create two distinct ads for a fictional herbal tea called Quiet Evening. Use a green tea tin, warm light and the headline Make time for yourself. No people.",
  "target_audience": "Busy professionals looking for a relaxing evening ritual",
  "niche": "Herbal tea",
  "language": "en",
  "aspect_ratio": "9:16",
  "batch_size": 2
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'Create two distinct ads for a fictional herbal tea called Quiet '
               'Evening. Use a green tea tin, warm light and the headline Make '
               'time for yourself. No people.',
     'target_audience': 'Busy professionals looking for a relaxing evening ritual',
     'niche': 'Herbal tea',
     'language': 'en',
     'aspect_ratio': '9:16',
     'batch_size': 2}
)
result = higgsfield_client.subscribe(
    "higgsfield/ads-studio/v1.0",
    arguments=arguments,
)
print(result["images"][0]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("higgsfield/ads-studio/v1.0", {
  input:
    {
      "prompt": "Create two distinct ads for a fictional herbal tea called Quiet Evening. Use a green tea tin, warm light and the headline Make time for yourself. No people.",
      "target_audience": "Busy professionals looking for a relaxing evening ritual",
      "niche": "Herbal tea",
      "language": "en",
      "aspect_ratio": "9:16",
      "batch_size": 2
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.images?.[0]?.url);
}
```

## Input schema

**niche** `string`

Optional product category or business niche used to guide ad concepts.
Maximum characters: `1000`.

**prompt** `string` *required*

Required marketing brief describing the product or service, desired message and visual direction. Must contain non-whitespace text.
Minimum characters: `1`.
Maximum characters: `8000`.
Pattern: `\S`.

**language** `string`

Optional language guidance for ad copy, for example en or ru. This is free text, not a fixed language-code enum.
Maximum characters: `80`.

**batch\_size** `integer` (default: 1)

Number of ad concepts and requested output images. Billing is summed across the rendered images.
Minimum: `1`.
Maximum: `8`.

**image\_urls** `array` (default: \[])

Optional product or visual reference images. Supply up to 10 directly downloadable HTTP(S) URLs. Omit or send \[] for text-only generation.
Maximum items: `10`.
Each item: string. Minimum characters: `1`. Maximum characters: `8192`. Pattern: `^https?://`.

**aspect\_ratio** `string` (default: 1:1)

Output width-to-height ratio shared by every image in the batch.
Allowed values: `"1:1"`, `"4:5"`, `"5:4"`, `"16:9"`, `"9:16"`, `"4:3"`, `"3:4"`, `"21:9"`, `"3:2"`, `"2:3"`, `"2:1"`, `"1:2"`, `"3:1"`, `"1:3"`.

**target\_audience** `string`

Optional description of the intended audience, such as interests, needs or use cases.
Maximum characters: `2000`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "niche": {
>       "type": "string",
>       "default": "",
>       "maxLength": 1000
>     },
>     "prompt": {
>       "type": "string",
>       "pattern": "\\S",
>       "maxLength": 8000,
>       "minLength": 1
>     },
>     "language": {
>       "type": "string",
>       "default": "",
>       "maxLength": 80
>     },
>     "batch_size": {
>       "type": "integer",
>       "default": 1,
>       "maximum": 8,
>       "minimum": 1
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "pattern": "^https?://",
>         "maxLength": 8192,
>         "minLength": 1
>       },
>       "default": [],
>       "maxItems": 10
>     },
>     "aspect_ratio": {
>       "enum": [
>         "1:1",
>         "4:5",
>         "5:4",
>         "16:9",
>         "9:16",
>         "4:3",
>         "3:4",
>         "21:9",
>         "3:2",
>         "2:3",
>         "2:1",
>         "1:2",
>         "3:1",
>         "1:3"
>       ],
>       "type": "string",
>       "default": "1:1"
>     },
>     "target_audience": {
>       "type": "string",
>       "default": "",
>       "maxLength": 2000
>     }
>   },
>   "additionalProperties": false
> }
> ```

## Product references

Omit `image_urls` for text-only generation. To guide the ad with your product, send direct image URLs that the service can download without browser cookies or custom authentication headers. An unexpired signed HTTPS URL is suitable. Keep the URLs valid while the request is being processed.

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "prompt": "Create three distinct premium perfume ads. Preserve the bottle and label. Use the headline Leave a lasting note.",
  "image_urls": ["https://example.com/product.png"],
  "target_audience": "People looking for a distinctive gift",
  "niche": "Fragrance",
  "language": "en",
  "aspect_ratio": "4:5",
  "batch_size": 3
}
```

Reference images guide generation; exact preservation of a product, label or text is not guaranteed. Supported oversized references are normalized before rendering. The output remains a PNG at the selected aspect ratio.

## Pricing

**Illustrative estimate: approximately \$0.084 per image.** This is a budgeting example, not a fixed charge or maximum price. Actual cost varies with the aspect ratio, prepared prompt, reference images and measured token usage. Consult the current model pricing in the Playground before submitting work.

| Token category | USD per 1 million tokens |
| - | -: |
| Text input | \$5.00 |
| Cached text input | \$1.25 |
| Text output | \$10.00 |
| Image input | \$8.00 |
| Cached image input | \$2.00 |
| Image output | \$30.00 |

The initial charge is an estimate reconciled to actual rendering usage on completion, with standard credit rounding. Cached input is charged at the cached rate instead of being counted again as uncached input. Ad concept preparation is not billed separately.

For a batch, the final price is the **sum of the actual image charges**. Do not multiply aggregated batch token usage by `batch_size` again. Three images at the illustrative estimate would budget approximately \$0.252; the actual total can differ.

## Check request status

Use the returned `status_url` with the same API credentials. Set `REQUEST_ID` to the identifier returned when you submit the request:

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request GET \
  --url "https://api.higgsfield.ai/requests/${REQUEST_ID}/status" \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

Follow the shared [polling guidance](/docs/concepts/polling). A request handle confirms acceptance, not successful image generation. Stop polling on `completed`, `failed`, `nsfw`, or `canceled`, and inspect the returned outputs and errors.

## Response

Submission returns one request handle for the entire batch:

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A fully successful two-image batch returns two indexed images:

```json Completed theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel",
  "status": "completed",
  "images": [
    {"index": 0, "url": "https://example.com/ad-1.png"},
    {"index": 1, "url": "https://example.com/ad-2.png"}
  ],
  "errors": []
}
```

Process every returned image rather than only `images[0]`. Use its zero-based `index` to identify its batch slot and inspect `errors` for unsuccessful slots. After `subscribe` returns, extend the Python quick start with:

```python theme={"theme":{"light":"github-light","dark":"github-dark"}}
for image in result.get("images", []):
    print(image["index"], image["url"])
for error in result.get("errors", []):
    print(error)
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Cinema Studio 4.0 API
Source: https://docs.higgsfield.ai/docs/models/cinema-studio-4

Create video shots with camera and style controls and media references.

Create video shots with camera and style controls and media references.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Generate](/docs/models/cinema-studio-4/generate) | `POST /higgsfield/cinema-studio/4.0` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Cinema Studio 4.0 — Generate API
Source: https://docs.higgsfield.ai/docs/models/cinema-studio-4/generate

Generate with Cinema Studio 4.0: request parameters, examples and response handling.

[← Cinema Studio 4.0](/docs/models/cinema-studio-4)

**Endpoint:** `POST https://api.higgsfield.ai/higgsfield/cinema-studio/4.0`

**Endpoint ID:** `higgsfield/cinema-studio/4.0`

[▶
Open API PlaygroundCinema Studio 4.0 · Generate
↗](https://console.higgsfield.ai/models/higgsfield%2Fcinema-studio%2F4.0/playground)

## Usage notes

* This is the public Cinema Studio 4.0 workflow. It uses text-to-video when references are absent and reference-to-video when any media array is nonempty.
* Omit creative-control fields to let the director choose them automatically; the literal value "auto" is not accepted for these enum fields.
* Optional prompt references use one-based tokens such as \<\<\<image\_1>>>, \<\<\<video\_1>>> and \<\<\<audio\_1>>>. Each token must refer to an attached item of the same media type.
* This endpoint produces a new video. Editing and extension use the separate Seedance 2.5 endpoints.
* Reference media are limited to 30 images, 10 videos and 10 audio files, with at most 50 items total. Video and audio may be normalized to separate 30-second total budgets.

## Quick start

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/cinema-studio/4.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.'}
)
result = higgsfield_client.subscribe(
    "higgsfield/cinema-studio/4.0",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("higgsfield/cinema-studio/4.0", {
  input:
    {
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**era** `string`

Allowed values: `"1960s"`, `"1980s"`, `"1990s"`, `"2000s"`, `"2020s"`.

**genre** `string`

Allowed values: `"epic"`, `"drama"`, `"noir"`, `"comedy"`, `"horror"`, `"action"`.

**light** `string`

Allowed values: `"silhouette"`, `"practicals"`, `"window"`, `"overhead-fall"`, `"contre-jour"`, `"soft-cross"`.

**pacing** `string`

Allowed values: `"chaotic"`, `"dynamic"`, `"calm"`, `"single-shot"`.

**prompt** `string` *required*

Text instructions for the generation or edit.
Minimum characters: `1`.
Pattern: `\S`.

**duration** `integer` (default: 5)

Requested output duration in seconds.
Minimum: `4`.
Maximum: `30`.

**audio\_urls** `array`

Ordered public audio reference URLs.
Maximum items: `10`.
Each item: string. Format: `uri`.

**image\_urls** `array`

Ordered public image reference URLs.
Maximum items: `30`.
Each item: string. Format: `uri`.

**resolution** `string` (default: 720p)

Output resolution tier.
Allowed values: `"480p"`, `"720p"`.

**video\_urls** `array`

Ordered public video reference URLs.
Maximum items: `10`.
Each item: string. Format: `uri`.

**camera\_lens** `string`

Allowed values: `"clean-sharp"`, `"anamorphic"`, `"vintage-anamorphic"`, `"warm-vintage"`, `"halation-vintage"`.

**aspect\_ratio** `string` (default: 16:9)

Output width-to-height ratio.
Allowed values: `"16:9"`, `"4:3"`, `"1:1"`, `"3:4"`, `"9:16"`, `"21:9"`.

**camera\_model** `string`

Allowed values: `"modern"`, `"35mm-film"`, `"8mm-film"`, `"dv-camcorder"`.

**color\_palette** `string`

Allowed values: `"static-noon"`, `"twilight-fable"`, `"back-row-kissing-seats"`, `"on-the-other-side-of-the-porthole"`, `"the-emerald-ambush"`, `"highway-standoff"`, `"the-faded-fresco"`, `"oil-ochre"`, `"the-mountain-convent"`, `"ghost-in-the-code"`, `"pink-velvet"`, `"two-days-to-the-horizon"`, `"industrial-fog"`, `"stairs-go-up"`, `"field-post"`, `"home-is-the-next-gas-station"`, `"glossy-flesh"`, `"the-crimson-ballet"`, `"neon-rain-at-midnight"`, `"the-morning-after-rain"`, `"the-iron-borough"`, `"the-ground"`, `"the-investigation"`, `"turquoise-mirage"`, `"a-dream-in-color"`, `"breakfast-on-schedule"`, `"favela-gold"`, `"a-hotel-for-one"`, `"after-dark"`, `"crimson-vigi"`, `"the-neighbors-saw-everything"`, `"the-grey-channel"`, `"mirage-at-noon"`, `"bubblegum-boulevard"`, `"yellow-room"`, `"the-earth-keeps-things-reluctantly"`, `"tropic-fever-dream"`, `"bioluminescent-night"`, `"dont-turn-it-off-im-watching"`, `"the-silk-curtain-falls"`, `"the-butterfly"`, `"playtime"`, `"wallpaper-romance"`, `"overtime"`, `"the-way-home-is-longer"`, `"everyone-speaks-in-whispers"`, `"runaway-summer"`, `"amber-wasteland"`, `"the-circus"`, `"gasoline-sunset"`.

**generate\_audio** `boolean` (default: true)

Generate audio with the video.

**camera\_aperture** `string`

Allowed values: `"f14-wide-open"`, `"f4-moderate"`, `"f11-deep-focus"`.

**camera\_movement** `string`

Allowed values: `"snorricam"`, `"robot-arm"`, `"tilt-up"`, `"rack-focus"`, `"tilt-down"`, `"pov"`, `"pan-left"`, `"crane-up"`, `"pan-right"`, `"crane-down"`, `"side-tracking"`, `"pedestal-up"`, `"pedestal-down"`, `"handheld"`, `"tracking"`, `"drone-orbit"`, `"dolly-zoom"`, `"aerial-pullback"`, `"static-shot"`, `"bullet-time"`, `"whip-pan"`, `"slow-zoom-in"`, `"arc-left"`, `"slow-zoom-out"`, `"arc-right"`, `"truck-right"`, `"dolly-in"`, `"truck-left"`, `"dolly-out"`, `"slider-right"`, `"crush-zoom"`, `"slider-left"`, `"helicopter-shot"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "era": {
>       "enum": [
>         "1960s",
>         "1980s",
>         "1990s",
>         "2000s",
>         "2020s"
>       ],
>       "type": "string"
>     },
>     "genre": {
>       "enum": [
>         "epic",
>         "drama",
>         "noir",
>         "comedy",
>         "horror",
>         "action"
>       ],
>       "type": "string"
>     },
>     "light": {
>       "enum": [
>         "silhouette",
>         "practicals",
>         "window",
>         "overhead-fall",
>         "contre-jour",
>         "soft-cross"
>       ],
>       "type": "string"
>     },
>     "pacing": {
>       "enum": [
>         "chaotic",
>         "dynamic",
>         "calm",
>         "single-shot"
>       ],
>       "type": "string"
>     },
>     "prompt": {
>       "type": "string",
>       "pattern": "\\S",
>       "minLength": 1
>     },
>     "duration": {
>       "type": "integer",
>       "default": 5,
>       "maximum": 30,
>       "minimum": 4
>     },
>     "audio_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri"
>       },
>       "maxItems": 10
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri"
>       },
>       "maxItems": 30
>     },
>     "resolution": {
>       "enum": [
>         "480p",
>         "720p"
>       ],
>       "type": "string",
>       "default": "720p"
>     },
>     "video_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri"
>       },
>       "maxItems": 10
>     },
>     "camera_lens": {
>       "enum": [
>         "clean-sharp",
>         "anamorphic",
>         "vintage-anamorphic",
>         "warm-vintage",
>         "halation-vintage"
>       ],
>       "type": "string"
>     },
>     "aspect_ratio": {
>       "enum": [
>         "16:9",
>         "4:3",
>         "1:1",
>         "3:4",
>         "9:16",
>         "21:9"
>       ],
>       "type": "string",
>       "default": "16:9"
>     },
>     "camera_model": {
>       "enum": [
>         "modern",
>         "35mm-film",
>         "8mm-film",
>         "dv-camcorder"
>       ],
>       "type": "string"
>     },
>     "color_palette": {
>       "enum": [
>         "static-noon",
>         "twilight-fable",
>         "back-row-kissing-seats",
>         "on-the-other-side-of-the-porthole",
>         "the-emerald-ambush",
>         "highway-standoff",
>         "the-faded-fresco",
>         "oil-ochre",
>         "the-mountain-convent",
>         "ghost-in-the-code",
>         "pink-velvet",
>         "two-days-to-the-horizon",
>         "industrial-fog",
>         "stairs-go-up",
>         "field-post",
>         "home-is-the-next-gas-station",
>         "glossy-flesh",
>         "the-crimson-ballet",
>         "neon-rain-at-midnight",
>         "the-morning-after-rain",
>         "the-iron-borough",
>         "the-ground",
>         "the-investigation",
>         "turquoise-mirage",
>         "a-dream-in-color",
>         "breakfast-on-schedule",
>         "favela-gold",
>         "a-hotel-for-one",
>         "after-dark",
>         "crimson-vigi",
>         "the-neighbors-saw-everything",
>         "the-grey-channel",
>         "mirage-at-noon",
>         "bubblegum-boulevard",
>         "yellow-room",
>         "the-earth-keeps-things-reluctantly",
>         "tropic-fever-dream",
>         "bioluminescent-night",
>         "dont-turn-it-off-im-watching",
>         "the-silk-curtain-falls",
>         "the-butterfly",
>         "playtime",
>         "wallpaper-romance",
>         "overtime",
>         "the-way-home-is-longer",
>         "everyone-speaks-in-whispers",
>         "runaway-summer",
>         "amber-wasteland",
>         "the-circus",
>         "gasoline-sunset"
>       ],
>       "type": "string"
>     },
>     "generate_audio": {
>       "type": "boolean",
>       "default": true
>     },
>     "camera_aperture": {
>       "enum": [
>         "f14-wide-open",
>         "f4-moderate",
>         "f11-deep-focus"
>       ],
>       "type": "string"
>     },
>     "camera_movement": {
>       "enum": [
>         "snorricam",
>         "robot-arm",
>         "tilt-up",
>         "rack-focus",
>         "tilt-down",
>         "pov",
>         "pan-left",
>         "crane-up",
>         "pan-right",
>         "crane-down",
>         "side-tracking",
>         "pedestal-up",
>         "pedestal-down",
>         "handheld",
>         "tracking",
>         "drone-orbit",
>         "dolly-zoom",
>         "aerial-pullback",
>         "static-shot",
>         "bullet-time",
>         "whip-pan",
>         "slow-zoom-in",
>         "arc-left",
>         "slow-zoom-out",
>         "arc-right",
>         "truck-right",
>         "dolly-in",
>         "truck-left",
>         "dolly-out",
>         "slider-right",
>         "crush-zoom",
>         "slider-left",
>         "helicopter-shot"
>       ],
>       "type": "string"
>     }
>   },
>   "additionalProperties": false
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Genjutsu API
Source: https://docs.higgsfield.ai/docs/models/genjutsu

Transfer motion, replace objects, or restyle a source video.

Transfer motion, replace objects, or restyle a source video.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Motion transfer](/docs/models/genjutsu/motion-transfer) | `POST /higgsfield/genjutsu/motion-transfer/v1.0` |
| [Object swap](/docs/models/genjutsu/object-swap) | `POST /higgsfield/genjutsu/object-swap/v1.0` |
| [Restyle](/docs/models/genjutsu/restyle) | `POST /higgsfield/genjutsu/restyle/v1.0` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Genjutsu — Motion transfer API
Source: https://docs.higgsfield.ai/docs/models/genjutsu/motion-transfer

Motion transfer with Genjutsu: request parameters, examples and response handling.

[← Genjutsu](/docs/models/genjutsu)

**Endpoint:** `POST https://api.higgsfield.ai/higgsfield/genjutsu/motion-transfer/v1.0`

**Endpoint ID:** `higgsfield/genjutsu/motion-transfer/v1.0`

[▶
Open API PlaygroundGenjutsu · Motion transfer
↗](https://console.higgsfield.ai/models/higgsfield%2Fgenjutsu%2Fmotion-transfer%2Fv1.0/playground)

## Usage notes

* Use higgsfield/genjutsu/motion-transfer/v1.0 for new integrations. The legacy endpoint higgsfiled/genjutsu/motion-transfer/v1.0 remains callable for existing clients but is hidden from model discovery.
* The source video must be at least 4 seconds. Videos longer than 30 seconds are trimmed to 30 seconds; output duration follows the prepared source video.
* Provide 1–8 image references. The prompt is optional and defaults to an empty string.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/genjutsu/motion-transfer/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "video_url": "https://example.com/input.mp4",
  "image_urls": [
    "https://example.com/input.jpg"
  ]
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'video_url': 'https://example.com/input.mp4',
     'image_urls': ['https://example.com/input.jpg']}
)
result = higgsfield_client.subscribe(
    "higgsfield/genjutsu/motion-transfer/v1.0",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("higgsfield/genjutsu/motion-transfer/v1.0", {
  input:
    {
      "video_url": "https://example.com/input.mp4",
      "image_urls": [
        "https://example.com/input.jpg"
      ]
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string`

Text instructions for the generation or edit.
Maximum characters: `10000`.

**video\_url** `string` *required*

Public URL of the source video.
Minimum characters: `1`.
Maximum characters: `2083`.
Format: `uri`.

**image\_urls** `array` *required*

Ordered public image reference URLs.
Minimum items: `1`.
Maximum items: `8`.
Each item: string. Minimum characters: `1`. Maximum characters: `2083`. Format: `uri`.

**resolution** `string` (default: 720p)

Output resolution tier.
Allowed values: `"720p"`, `"480p"`, `"1080p"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "MotionTransferParams",
>   "required": [
>     "video_url",
>     "image_urls"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "default": "",
>       "maxLength": 10000
>     },
>     "video_url": {
>       "type": "string",
>       "title": "Video Url",
>       "format": "uri",
>       "maxLength": 2083,
>       "minLength": 1
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri",
>         "maxLength": 2083,
>         "minLength": 1
>       },
>       "title": "Image Urls",
>       "maxItems": 8,
>       "minItems": 1
>     },
>     "resolution": {
>       "enum": [
>         "720p",
>         "480p",
>         "1080p"
>       ],
>       "type": "string",
>       "title": "Resolution",
>       "default": "720p"
>     }
>   },
>   "additionalProperties": false
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Genjutsu — Object swap API
Source: https://docs.higgsfield.ai/docs/models/genjutsu/object-swap

Object swap with Genjutsu: request parameters, examples and response handling.

[← Genjutsu](/docs/models/genjutsu)

**Endpoint:** `POST https://api.higgsfield.ai/higgsfield/genjutsu/object-swap/v1.0`

**Endpoint ID:** `higgsfield/genjutsu/object-swap/v1.0`

[▶
Open API PlaygroundGenjutsu · Object swap
↗](https://console.higgsfield.ai/models/higgsfield%2Fgenjutsu%2Fobject-swap%2Fv1.0/playground)

## Usage notes

* Use higgsfield/genjutsu/object-swap/v1.0 for new integrations. The legacy endpoint higgsfiled/genjutsu/object-swap/v1.0 remains callable for existing clients but is hidden from model discovery.
* The source video must be at least 4 seconds. Videos longer than 30 seconds are trimmed to 30 seconds; output duration follows the prepared source video.
* Provide 1–8 image references. The prompt is optional and defaults to an empty string.
* The source video must contain at least 409,600 pixels per frame (width × height).

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/genjutsu/object-swap/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "video_url": "https://example.com/input.mp4",
  "image_urls": [
    "https://example.com/input.jpg"
  ]
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'video_url': 'https://example.com/input.mp4',
     'image_urls': ['https://example.com/input.jpg']}
)
result = higgsfield_client.subscribe(
    "higgsfield/genjutsu/object-swap/v1.0",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("higgsfield/genjutsu/object-swap/v1.0", {
  input:
    {
      "video_url": "https://example.com/input.mp4",
      "image_urls": [
        "https://example.com/input.jpg"
      ]
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string`

Text instructions for the generation or edit.
Maximum characters: `10000`.

**video\_url** `string` *required*

Public URL of the source video.
Minimum characters: `1`.
Maximum characters: `2083`.
Format: `uri`.

**image\_urls** `array` *required*

Ordered public image reference URLs.
Minimum items: `1`.
Maximum items: `8`.
Each item: string. Minimum characters: `1`. Maximum characters: `2083`. Format: `uri`.

**resolution** `string` (default: 720p)

Output resolution tier.
Allowed values: `"720p"`, `"480p"`, `"1080p"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "ObjectSwapParams",
>   "required": [
>     "video_url",
>     "image_urls"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "default": "",
>       "maxLength": 10000
>     },
>     "video_url": {
>       "type": "string",
>       "title": "Video Url",
>       "format": "uri",
>       "maxLength": 2083,
>       "minLength": 1
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri",
>         "maxLength": 2083,
>         "minLength": 1
>       },
>       "title": "Image Urls",
>       "maxItems": 8,
>       "minItems": 1
>     },
>     "resolution": {
>       "enum": [
>         "720p",
>         "480p",
>         "1080p"
>       ],
>       "type": "string",
>       "title": "Resolution",
>       "default": "720p"
>     }
>   },
>   "additionalProperties": false
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Genjutsu — Restyle API
Source: https://docs.higgsfield.ai/docs/models/genjutsu/restyle

Restyle with Genjutsu: request parameters, examples and response handling.

[← Genjutsu](/docs/models/genjutsu)

**Endpoint:** `POST https://api.higgsfield.ai/higgsfield/genjutsu/restyle/v1.0`

**Endpoint ID:** `higgsfield/genjutsu/restyle/v1.0`

[▶
Open API PlaygroundGenjutsu · Restyle
↗](https://console.higgsfield.ai/models/higgsfield%2Fgenjutsu%2Frestyle%2Fv1.0/playground)

## Usage notes

* Restyle changes the visual style of a source video while retaining its motion, shot composition, and source audio. Each request produces one video.
* Select a current style from GET /models/higgsfield/genjutsu/restyle/v1.0/presets and send its UUID as preset\_id. The example UUID below is illustrative of a published preset; fetch the current catalog before submitting.
* The source must be at least 4 seconds and no larger than 200 MiB. Videos longer than 30 seconds are trimmed to their first 30 seconds, including audio.
* Character references are optional: omit image\_urls or send \[] to restyle the existing source subjects. Supply up to 5 character images to guide their appearance.
* Defaults apply to omitted optional fields. Use \[] or an empty string where appropriate; null is not accepted.
* Output framing is derived from the source and animation cadence can depend on the selected style. Exact output duration and FPS may differ from the source.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/genjutsu/restyle/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "video_url": "https://example.com/input.mp4",
  "preset_id": "c2143317-f28d-4c3c-a0b8-39bd547e08a7",
  "image_urls": [],
  "prompt": "Preserve the original movement and camera composition.",
  "resolution": "720p"
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'video_url': 'https://example.com/input.mp4',
     'preset_id': 'c2143317-f28d-4c3c-a0b8-39bd547e08a7',
     'image_urls': [],
     'prompt': 'Preserve the original movement and camera composition.',
     'resolution': '720p'}
)
result = higgsfield_client.subscribe(
    "higgsfield/genjutsu/restyle/v1.0",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("higgsfield/genjutsu/restyle/v1.0", {
  input:
    {
      "video_url": "https://example.com/input.mp4",
      "preset_id": "c2143317-f28d-4c3c-a0b8-39bd547e08a7",
      "image_urls": [],
      "prompt": "Preserve the original movement and camera composition.",
      "resolution": "720p"
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string`

Optional additional guidance for the final video alongside the preset, source motion, and character references. Describe subject roles or details to retain, for example: “Keep the referenced character’s pink hair consistent across shots.” An empty string uses the visual inputs without additional instructions. This supplements preset\_id; it does not create a custom style or set duration, resolution, FPS, or audio behavior. Instructions guide a generative result and do not guarantee exact preservation.
Maximum characters: `10000`.

**preset\_id** `string` *required*

Required UUID from items\[].id in the [available styles](#available-styles) response. Selects one visual style for the subjects and scene. Send the ID, not the style name, preview URL, or list index. A prompt or character image does not replace this field. Hidden or unavailable presets fail input preparation; no alternative style is selected automatically. Custom/personal presets and multiple simultaneous styles are not supported.
Format: `uuid`.

**video\_url** `string` *required*

Direct URL of the source video that supplies motion, camera movement, composition, and the source scene. It must be downloadable without browser cookies or custom authentication headers; an unexpired signed HTTPS URL is suitable. Minimum duration: 4 seconds. Maximum download size: 200 MiB (209,715,200 bytes), including files that will be trimmed. Longer clips use only their first 30 seconds; trim your upload first if you need another segment. Use a decodable video such as MP4, not a player page or local file path. Original audio is retained when present; there is no new-soundtrack control.
Minimum characters: `1`.
Format: `uri`.

**image\_urls** `array` (default: \[])

Optional character appearance references, in a stable order. Omit this field or send \[] to derive the styled subjects and scene from the source video. With references, each character image is restyled and the source background is cleaned and styled separately before video generation. Each URL must point directly to a downloadable image; JPEG and PNG are practical choices. Maximum download size: 64 MiB (67,108,864 bytes) per image. Images are normalized, so their dimensions do not set the output video size. These are character references, not style previews or background-only inputs. For multiple characters, describe the intended roles in prompt; the public API provides no explicit reference-to-person mapping.
Maximum items: `5`.
Each item: string. Minimum characters: `1`. Format: `uri`.

**resolution** `string` (default: 720p)

Output resolution tier; strings are case-sensitive. Defaults to 720p. Send a supported string such as "720p", not the number 720 or "HD". This setting selects the video price tier and does not set the aspect ratio, duration, or FPS.
Allowed values: `"480p"`, `"720p"`, `"1080p"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Genjutsu Restyle",
>   "required": [
>     "video_url",
>     "preset_id"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "default": "",
>       "maxLength": 10000
>     },
>     "preset_id": {
>       "type": "string",
>       "title": "Style preset",
>       "format": "uuid"
>     },
>     "video_url": {
>       "type": "string",
>       "title": "Source video",
>       "format": "uri",
>       "minLength": 1,
>       "description": "Source video, 4–30 seconds. Longer videos are trimmed to 30 seconds."
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri",
>         "minLength": 1
>       },
>       "title": "Character images",
>       "default": [],
>       "maxItems": 5,
>       "description": "Optional character references. Leave empty to restyle the source frame."
>     },
>     "resolution": {
>       "enum": [
>         "480p",
>         "720p",
>         "1080p"
>       ],
>       "type": "string",
>       "title": "Resolution",
>       "default": "720p"
>     }
>   },
>   "additionalProperties": false
> }
> ```

## Available styles

Styles are called **presets** in the API. Fetch the catalog before selecting a style:

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --fail-with-body --silent --show-error \
  'https://api.higgsfield.ai/models/higgsfield/genjutsu/restyle/v1.0/presets' \
  -H "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

No request body, query parameters, or pagination parameters are needed. The endpoint requires authentication and access to the Restyle model. It returns all currently selectable system presets, ordered by name and ID. Hidden or unusable presets are omitted; personal/custom styles are not included.

Example response, shortened to one item:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "model": "higgsfield/genjutsu/restyle/v1.0",
  "items": [
    {
      "id": "c2143317-f28d-4c3c-a0b8-39bd547e08a7",
      "name": "Cel-Shaded CG Anime",
      "preview_url": "https://cdn.higgsfield.ai/restyle_presets/259d7ddb-4201-49f7-8a91-cee5bce28715.webp"
    }
  ]
}
```

| Response field | Meaning |
| - | - |
| `model` | The generation model to which this catalog belongs. |
| `items` | Array of available styles. Treat an empty array as no selectable styles. |
| `items[].id` | Style UUID. Copy this value into the generation request's `preset_id`. |
| `items[].name` | Human-readable style name for a menu or style picker. |
| `items[].preview_url` | Style preview image for display. This is not the value of `preset_id` and does not need to be sent in `image_urls`. |

Select exactly one item. Use its `id`, not its name, list position, or preview URL. The example ID above was available when this documentation was written; always use the current catalog in your application. If a saved selection disappears, refresh the list and select an available style.

## Character references

Without `image_urls`, Restyle takes the existing source subject and scene as its appearance reference. With `image_urls`, it styles each supplied character image and prepares a styled background from the source scene. In both cases, `video_url` supplies the motion and `preset_id` supplies the visual style.

For example, use this generation body to include a character reference. Replace the media URLs and select a current preset ID:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "video_url": "https://example.com/input.mp4",
  "preset_id": "c2143317-f28d-4c3c-a0b8-39bd547e08a7",
  "image_urls": ["https://example.com/character.png"],
  "prompt": "Keep the referenced character consistent across shots while preserving the original movement.",
  "resolution": "1080p"
}
```

There are only five public model inputs: `video_url`, `preset_id`, `image_urls`, `prompt`, and `resolution`. Batch size, duration, aspect ratio, FPS, scene mode, a separate background image, seed, and provider selection are not exposed by this model.

## Approximate pricing

| Resolution | Approximate price per source-video second |
| - | - |
| `480p` | \$0.318 |
| `720p` | \$0.681 |
| `1080p` | \$1.632 |

These are approximate per-second rates, not an exact total quote. Source duration is rounded up to whole seconds after trimming to 30 seconds: an 8.1-second source is billed as 9 seconds.

## Check request status

The same API key is used to list styles, submit generation, and poll the result. Set `HF_API_KEY_ID` and `HF_API_KEY_SECRET` to your API credentials. Set a unique `IDEMPOTENCY_KEY` for each intended generation, and reuse it only when retrying that request.

After submission, poll the returned `status_url`, or set `REQUEST_ID` to the returned ID:

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --fail-with-body --silent --show-error \
  "https://api.higgsfield.ai/requests/${REQUEST_ID}/status" \
  -H "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

A request can be `queued` or `in_progress` before it completes. Stop polling on `completed`, `failed`, `nsfw`, or `canceled`. A failed response includes an `error` message. Media download and unavailable-preset errors can occur after acceptance; a request handle alone does not mean that generation succeeded. Keep signed media URLs valid while inputs are fetched.

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Grok Image 2.0 API
Source: https://docs.higgsfield.ai/docs/models/grok-image-2

Generate and edit images with up to ten image references.

Generate and edit images with up to ten image references.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Generate and edit](/docs/models/grok-image-2/generate-and-edit) | `POST /xai/grok-imagine-image-2.0` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Grok Image 2.0 — Generate and edit API
Source: https://docs.higgsfield.ai/docs/models/grok-image-2/generate-and-edit

Generate and edit with Grok Image 2.0: request parameters, examples and response handling.

[← Grok Image 2.0](/docs/models/grok-image-2)

**Endpoint:** `POST https://api.higgsfield.ai/xai/grok-imagine-image-2.0`

**Endpoint ID:** `xai/grok-imagine-image-2.0`

[▶
Open API PlaygroundGrok Image 2.0 · Generate and edit
↗](https://console.higgsfield.ai/models/xai%2Fgrok-imagine-image-2.0/playground)

## Usage notes

* Supports both text-to-image and editing: omit image\_urls for generation, or supply up to 10 references for editing.
* quality accepts low or medium only; resolution accepts 1k or 2k. aspect\_ratio defaults to auto.
* Reference images may be resized during preprocessing before submission. The request produces one image; no batch count is declared.

## Quick start

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/xai/grok-imagine-image-2.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A ceramic vase on a wooden table beside a sunlit window, soft natural shadows, editorial photograph.",
  "resolution": "1k",
  "aspect_ratio": "1:1",
  "quality": "medium"
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A ceramic vase on a wooden table beside a sunlit window, soft '
               'natural shadows, editorial photograph.',
     'resolution': '1k',
     'aspect_ratio': '1:1',
     'quality': 'medium'}
)
result = higgsfield_client.subscribe(
    "xai/grok-imagine-image-2.0",
    arguments=arguments,
)
print(result["images"][0]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("xai/grok-imagine-image-2.0", {
  input:
    {
      "prompt": "A ceramic vase on a wooden table beside a sunlit window, soft natural shadows, editorial photograph.",
      "resolution": "1k",
      "aspect_ratio": "1:1",
      "quality": "medium"
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.images?.[0]?.url);
}
```

## Input schema

**prompt** `string` *required*

Write your prompt here

**quality** `string` (default: medium)

Allowed values: `"low"`, `"medium"`.

**image\_urls** `array`

Ordered public image reference URLs.
Minimum items: `0`.
Maximum items: `10`.
Each item: string. Format: `uri`.

**resolution** `string` (default: 1k)

Output resolution tier.
Allowed values: `"1k"`, `"2k"`.

**aspect\_ratio** `string` (default: auto)

Output width-to-height ratio.
Allowed values: `"auto"`, `"1:1"`, `"1:2"`, `"2:1"`, `"3:2"`, `"2:3"`, `"4:3"`, `"3:4"`, `"16:9"`, `"9:16"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Grok Imagine 2.0 Playground",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "quality": {
>       "enum": [
>         "low",
>         "medium"
>       ],
>       "type": "string",
>       "title": "Quality",
>       "default": "medium"
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "title": "Image",
>         "format": "uri"
>       },
>       "title": "Input Images",
>       "maxItems": 10,
>       "minItems": 0
>     },
>     "resolution": {
>       "enum": [
>         "1k",
>         "2k"
>       ],
>       "type": "string",
>       "title": "Resolution",
>       "default": "1k"
>     },
>     "aspect_ratio": {
>       "enum": [
>         "auto",
>         "1:1",
>         "1:2",
>         "2:1",
>         "3:2",
>         "2:3",
>         "4:3",
>         "3:4",
>         "16:9",
>         "9:16"
>       ],
>       "type": "string",
>       "default": "auto"
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "images": [
    {
      "url": "https://example.com/output.png"
    }
  ]
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Grok Imagine Video 1.5 API
Source: https://docs.higgsfield.ai/docs/models/grok-video-1-5

Generate videos from text, images or an audio reference.

Generate videos from text, images or an audio reference.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Reference to video](/docs/models/grok-video-1-5/reference-to-video) | `POST /xai/grok-imagine-video/v1.5/reference-to-video` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Grok Imagine Video 1.5 — Reference to video API
Source: https://docs.higgsfield.ai/docs/models/grok-video-1-5/reference-to-video

Reference to video with Grok Imagine Video 1.5: request parameters, examples and response handling.

[← Grok Imagine Video 1.5](/docs/models/grok-video-1-5)

**Endpoint:** `POST https://api.higgsfield.ai/xai/grok-imagine-video/v1.5/reference-to-video`

**Endpoint ID:** `xai/grok-imagine-video/v1.5/reference-to-video`

[▶
Open API PlaygroundGrok Imagine Video 1.5 · Reference to video
↗](https://console.higgsfield.ai/models/xai%2Fgrok-imagine-video%2Fv1.5%2Freference-to-video/playground)

## Usage notes

* This endpoint also accepts text-only requests or one first-frame image. Choose either image\_url or reference media (image\_urls/audio\_url); do not combine these modes.
* When image\_urls or audio\_url is provided, resolution must be 480p or 720p. The shared schema also lists 1080p, which is rejected in reference mode.
* Input images must decode as JPEG, PNG, WebP or GIF; SVG and XML are unsupported.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/xai/grok-imagine-video/v1.5/reference-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement.",
  "image_urls": [
    "https://example.com/input.jpg"
  ]
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.',
     'image_urls': ['https://example.com/input.jpg']}
)
result = higgsfield_client.subscribe(
    "xai/grok-imagine-video/v1.5/reference-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("xai/grok-imagine-video/v1.5/reference-to-video", {
  input:
    {
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement.",
      "image_urls": [
        "https://example.com/input.jpg"
      ]
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string` *required*

Write your prompt here

**duration** `integer` (default: 5)

Requested output duration in seconds.
Minimum: `1`.
Maximum: `15`.

**audio\_url** `string`

Public URL of the audio reference.
Format: `uri`.

**image\_url** `string`

Public URL of the input image.
Format: `uri`.

**image\_urls** `array`

Ordered public image reference URLs.
Minimum items: `0`.
Maximum items: `7`.
Each item: string. Format: `uri`.

**resolution** `string` (default: 480p)

Output resolution tier.
Allowed values: `"480p"`, `"720p"`, `"1080p"`.

**aspect\_ratio** `string` (default: auto)

Output width-to-height ratio.
Allowed values: `"auto"`, `"1:1"`, `"16:9"`, `"9:16"`, `"4:3"`, `"3:4"`, `"3:2"`, `"2:3"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Grok Imagine Video 1.5 Reference Playground",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "type": "integer",
>       "title": "Duration",
>       "default": 5,
>       "maximum": 15,
>       "minimum": 1
>     },
>     "audio_url": {
>       "type": "string",
>       "title": "Reference audio",
>       "format": "uri"
>     },
>     "image_url": {
>       "type": "string",
>       "title": "First-frame image",
>       "format": "uri"
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "title": "Image",
>         "format": "uri"
>       },
>       "title": "Reference images",
>       "maxItems": 7,
>       "minItems": 0
>     },
>     "resolution": {
>       "enum": [
>         "480p",
>         "720p",
>         "1080p"
>       ],
>       "type": "string",
>       "title": "Resolution",
>       "default": "480p"
>     },
>     "aspect_ratio": {
>       "enum": [
>         "auto",
>         "1:1",
>         "16:9",
>         "9:16",
>         "4:3",
>         "3:4",
>         "3:2",
>         "2:3"
>       ],
>       "type": "string",
>       "default": "auto"
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Hailuo 2.3 API
Source: https://docs.higgsfield.ai/docs/models/hailuo-2-3

Generate videos from text or an image with Hailuo 2.3 Standard.

Generate videos from text or an image with Hailuo 2.3 Standard.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Standard text to video](/docs/models/hailuo-2-3/standard-text-to-video) | `POST /minimax/hailuo-2.3/standard/text-to-video` |
| [Standard image to video](/docs/models/hailuo-2-3/standard-image-to-video) | `POST /minimax/hailuo-2.3/standard/image-to-video` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Hailuo 2.3 — Standard image to video API
Source: https://docs.higgsfield.ai/docs/models/hailuo-2-3/standard-image-to-video

Standard image to video with Hailuo 2.3: request parameters, examples and response handling.

[← Hailuo 2.3](/docs/models/hailuo-2-3)

**Endpoint:** `POST https://api.higgsfield.ai/minimax/hailuo-2.3/standard/image-to-video`

**Endpoint ID:** `minimax/hailuo-2.3/standard/image-to-video`

[▶
Open API PlaygroundHailuo 2.3 · Standard image to video
↗](https://console.higgsfield.ai/models/minimax%2Fhailuo-2.3%2Fstandard%2Fimage-to-video/playground)

## Usage notes

* This Standard endpoint uses a fixed 768P output resolution; resolution is not a configurable field in the production schema.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/minimax/hailuo-2.3/standard/image-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement.",
  "image_url": "https://example.com/input.jpg"
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.',
     'image_url': 'https://example.com/input.jpg'}
)
result = higgsfield_client.subscribe(
    "minimax/hailuo-2.3/standard/image-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("minimax/hailuo-2.3/standard/image-to-video", {
  input:
    {
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement.",
      "image_url": "https://example.com/input.jpg"
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string` *required*

Write your prompt here

**duration** `integer` (default: 6)

Requested output duration in seconds.
Allowed values: `6`, `10`.

**image\_url** `string` *required*

Public URL of the input image.
Format: `uri`.

**prompt\_optimizer** `boolean` (default: true)

See the complete JSON schema below.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Minimax Hailuo 2.3 Playground",
>   "required": [
>     "prompt",
>     "image_url"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "enum": [
>         6,
>         10
>       ],
>       "type": "integer",
>       "title": "Duration",
>       "default": 6
>     },
>     "image_url": {
>       "type": "string",
>       "title": "Image URL",
>       "format": "uri"
>     },
>     "prompt_optimizer": {
>       "type": "boolean",
>       "title": "Prompt optimizer",
>       "default": true
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Hailuo 2.3 — Standard text to video API
Source: https://docs.higgsfield.ai/docs/models/hailuo-2-3/standard-text-to-video

Standard text to video with Hailuo 2.3: request parameters, examples and response handling.

[← Hailuo 2.3](/docs/models/hailuo-2-3)

**Endpoint:** `POST https://api.higgsfield.ai/minimax/hailuo-2.3/standard/text-to-video`

**Endpoint ID:** `minimax/hailuo-2.3/standard/text-to-video`

[▶
Open API PlaygroundHailuo 2.3 · Standard text to video
↗](https://console.higgsfield.ai/models/minimax%2Fhailuo-2.3%2Fstandard%2Ftext-to-video/playground)

## Usage notes

* This Standard endpoint uses a fixed 768P output resolution; resolution is not a configurable field in the production schema.

## Quick start

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/minimax/hailuo-2.3/standard/text-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.'}
)
result = higgsfield_client.subscribe(
    "minimax/hailuo-2.3/standard/text-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("minimax/hailuo-2.3/standard/text-to-video", {
  input:
    {
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string` *required*

Write your prompt here

**duration** `integer` (default: 6)

Requested output duration in seconds.
Allowed values: `6`, `10`.

**prompt\_optimizer** `boolean` (default: true)

See the complete JSON schema below.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Minimax Hailuo 2.3 Playground",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "enum": [
>         6,
>         10
>       ],
>       "type": "integer",
>       "title": "Duration",
>       "default": 6
>     },
>     "prompt_optimizer": {
>       "type": "boolean",
>       "title": "Prompt optimizer",
>       "default": true
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Happy Horse 1.0 API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1

Generate videos from text, a starting image or reference images.

Generate videos from text, a starting image or reference images.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Text to video](/docs/models/happy-horse-1/text-to-video) | `POST /alibaba/happy-horse/text-to-video` |
| [Image to video](/docs/models/happy-horse-1/image-to-video) | `POST /alibaba/happy-horse/image-to-video` |
| [Reference to video](/docs/models/happy-horse-1/reference-to-video) | `POST /alibaba/happy-horse/reference-to-video` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# HappyHorse 1.1 API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1-1

Generate videos from text, a starting image or reference images.

Generate videos from text, a starting image or reference images.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Text to video](/docs/models/happy-horse-1-1/text-to-video) | `POST /alibaba/happy-horse/v1.1/text-to-video` |
| [Image to video](/docs/models/happy-horse-1-1/image-to-video) | `POST /alibaba/happy-horse/v1.1/image-to-video` |
| [Reference to video](/docs/models/happy-horse-1-1/reference-to-video) | `POST /alibaba/happy-horse/v1.1/reference-to-video` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# HappyHorse 1.1 — Image to video API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1-1/image-to-video

Image to video with HappyHorse 1.1: request parameters, examples and response handling.

[← HappyHorse 1.1](/docs/models/happy-horse-1-1)

**Endpoint:** `POST https://api.higgsfield.ai/alibaba/happy-horse/v1.1/image-to-video`

**Endpoint ID:** `alibaba/happy-horse/v1.1/image-to-video`

[▶
Open API PlaygroundHappyHorse 1.1 · Image to video
↗](https://console.higgsfield.ai/models/alibaba%2Fhappy-horse%2Fv1.1%2Fimage-to-video/playground)

## Usage notes

* The prompt is optional. This endpoint accepts one first-frame image; it does not support a last-frame image.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/alibaba/happy-horse/v1.1/image-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "image_url": "https://example.com/input.jpg"
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'image_url': 'https://example.com/input.jpg'}
)
result = higgsfield_client.subscribe(
    "alibaba/happy-horse/v1.1/image-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("alibaba/happy-horse/v1.1/image-to-video", {
  input:
    {
      "image_url": "https://example.com/input.jpg"
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**seed** `integer`

Seed used to control generation randomness.
Minimum: `1`.
Maximum: `2147483646`.

**prompt** `string`

Write your prompt here

**duration** `integer` (default: 5)

Requested output duration in seconds.
Minimum: `2`.
Maximum: `15`.

**image\_url** `string` *required*

Public URL of the input image.
Format: `uri`.

**resolution** `string` (default: 1080p)

Output resolution tier.
Allowed values: `"720p"`, `"1080p"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Happy horse",
>   "required": [
>     "image_url"
>   ],
>   "properties": {
>     "seed": {
>       "type": "integer",
>       "maximum": 2147483646,
>       "minimum": 1
>     },
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "type": "integer",
>       "title": "Duration",
>       "default": 5,
>       "maximum": 15,
>       "minimum": 2
>     },
>     "image_url": {
>       "type": "string",
>       "title": "Image URL",
>       "format": "uri"
>     },
>     "resolution": {
>       "enum": [
>         "720p",
>         "1080p"
>       ],
>       "type": "string",
>       "default": "1080p"
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# HappyHorse 1.1 — Reference to video API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1-1/reference-to-video

Reference to video with HappyHorse 1.1: request parameters, examples and response handling.

[← HappyHorse 1.1](/docs/models/happy-horse-1-1)

**Endpoint:** `POST https://api.higgsfield.ai/alibaba/happy-horse/v1.1/reference-to-video`

**Endpoint ID:** `alibaba/happy-horse/v1.1/reference-to-video`

[▶
Open API PlaygroundHappyHorse 1.1 · Reference to video
↗](https://console.higgsfield.ai/models/alibaba%2Fhappy-horse%2Fv1.1%2Freference-to-video/playground)

## Usage notes

* Provide 1–9 reference images. This limit is enforced at submission even though the stored JSON Schema does not set minItems or maxItems. Reference videos are unsupported.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/alibaba/happy-horse/v1.1/reference-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "image_urls": [
    "https://example.com/input.jpg"
  ],
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'image_urls': ['https://example.com/input.jpg'],
     'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.'}
)
result = higgsfield_client.subscribe(
    "alibaba/happy-horse/v1.1/reference-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("alibaba/happy-horse/v1.1/reference-to-video", {
  input:
    {
      "image_urls": [
        "https://example.com/input.jpg"
      ],
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**seed** `integer`

Seed used to control generation randomness.
Minimum: `1`.
Maximum: `2147483646`.

**prompt** `string` *required*

Write your prompt here

**duration** `integer` (default: 5)

Requested output duration in seconds.
Minimum: `2`.
Maximum: `15`.

**image\_urls** `array` *required*

Ordered public image reference URLs.
Each item: string. Format: `uri`.

**resolution** `string` (default: 1080p)

Output resolution tier.
Allowed values: `"720p"`, `"1080p"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Happy horse",
>   "required": [
>     "image_urls",
>     "prompt"
>   ],
>   "properties": {
>     "seed": {
>       "type": "integer",
>       "maximum": 2147483646,
>       "minimum": 1
>     },
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "type": "integer",
>       "title": "Duration",
>       "default": 5,
>       "maximum": 15,
>       "minimum": 2
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "title": "Image URL",
>         "format": "uri"
>       }
>     },
>     "resolution": {
>       "enum": [
>         "720p",
>         "1080p"
>       ],
>       "type": "string",
>       "default": "1080p"
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# HappyHorse 1.1 — Text to video API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1-1/text-to-video

Text to video with HappyHorse 1.1: request parameters, examples and response handling.

[← HappyHorse 1.1](/docs/models/happy-horse-1-1)

**Endpoint:** `POST https://api.higgsfield.ai/alibaba/happy-horse/v1.1/text-to-video`

**Endpoint ID:** `alibaba/happy-horse/v1.1/text-to-video`

[▶
Open API PlaygroundHappyHorse 1.1 · Text to video
↗](https://console.higgsfield.ai/models/alibaba%2Fhappy-horse%2Fv1.1%2Ftext-to-video/playground)

## Usage notes

* The prompt must contain text; an empty string is rejected during submission.

## Quick start

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/alibaba/happy-horse/v1.1/text-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.'}
)
result = higgsfield_client.subscribe(
    "alibaba/happy-horse/v1.1/text-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("alibaba/happy-horse/v1.1/text-to-video", {
  input:
    {
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**seed** `integer`

Seed used to control generation randomness.
Minimum: `1`.
Maximum: `2147483646`.

**prompt** `string` *required*

Write your prompt here

**duration** `integer` (default: 5)

Requested output duration in seconds.
Minimum: `3`.
Maximum: `15`.

**resolution** `string` (default: 1080p)

Output resolution tier.
Allowed values: `"720p"`, `"1080p"`.

**aspect\_ratio** `string` (default: 16:9)

Output width-to-height ratio.
Allowed values: `"16:9"`, `"9:16"`, `"1:1"`, `"4:3"`, `"3:4"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Happy Horse",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "seed": {
>       "type": "integer",
>       "maximum": 2147483646,
>       "minimum": 1
>     },
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "type": "integer",
>       "title": "Duration",
>       "default": 5,
>       "maximum": 15,
>       "minimum": 3
>     },
>     "resolution": {
>       "enum": [
>         "720p",
>         "1080p"
>       ],
>       "type": "string",
>       "default": "1080p"
>     },
>     "aspect_ratio": {
>       "enum": [
>         "16:9",
>         "9:16",
>         "1:1",
>         "4:3",
>         "3:4"
>       ],
>       "type": "string",
>       "title": "Aspect Ratio",
>       "default": "16:9"
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Happy Horse 1.0 — Image to video API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1/image-to-video

Image to video with Happy Horse 1.0: request parameters, examples and response handling.

[← Happy Horse 1.0](/docs/models/happy-horse-1)

**Endpoint:** `POST https://api.higgsfield.ai/alibaba/happy-horse/image-to-video`

**Endpoint ID:** `alibaba/happy-horse/image-to-video`

[▶
Open API PlaygroundHappy Horse 1.0 · Image to video
↗](https://console.higgsfield.ai/models/alibaba%2Fhappy-horse%2Fimage-to-video/playground)

## Usage notes

* The prompt is optional. This endpoint accepts one first-frame image; it does not support a last-frame image.

## Quick start

Replace the example media URLs with p


# https://docs.higgsfield.ai/docs/llms-full.txt
# API reference
Source: https://docs.higgsfield.ai/docs/api-reference/overview

Reference for Higgsfield image and video generation operations, request status, and cancellation.

The API reference is generated from the public OpenAPI specification. It includes model-specific generation schemas plus the shared status and cancellation operations.

**Base URL:** `https://api.higgsfield.ai`

All endpoints require the [`Authorization` header](/docs/authentication). Generation submissions also accept an optional [`Idempotency-Key`](/docs/concepts/idempotency) for safe retries.

Use the generation endpoint available to your account. Use **Get request status** in the sidebar to retrieve state and output for an existing request. Use **Cancel a queued request** to stop work that has not started processing.

For the complete integration flow, start with the [Quickstart](/docs/quickstart) and [Requests and lifecycle](/docs/concepts/requests).


# Cancel a queued request
Source: https://docs.higgsfield.ai/docs/api-reference/requests/cancel-a-queued-request

/openapi.json post /requests/{request_id}/cancel
Cancel a request that has not started processing. A successful response has no body.



# Get request status
Source: https://docs.higgsfield.ai/docs/api-reference/requests/get-request-status

/openapi.json get /requests/{request_id}/status
Retrieve the current state and output of a generation request.



# Authentication
Source: https://docs.higgsfield.ai/docs/authentication

Authenticate server-side API requests with your Higgsfield key and secret.

Create and manage API credentials in [Higgsfield Console](https://console.higgsfield.ai). Each credential consists of a key ID and a secret.

## Authorization header

Send both values in the `Authorization` header:

```http theme={"theme":{"light":"github-light","dark":"github-dark"}}
Authorization: Key YOUR_KEY_ID:YOUR_KEY_SECRET
```

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl https://api.higgsfield.ai/requests/REQUEST_ID/status \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

The API also accepts the legacy `hf-api-key` and `hf-secret` headers. New integrations should use the `Authorization` header.

## Keep credentials server-side

> [!WARNING]
>
> Do not call the API directly from browser or mobile application code. Anyone who can inspect the application can extract its API secret and use your account.

* Store credentials in a secrets manager or encrypted environment variables.
* Use separate credentials for development and production.
* Never include credentials in URLs, logs, screenshots, or support messages.
* Rotate a credential immediately if it may have been exposed.

## Authentication errors

Missing, malformed, or invalid credentials return `401 Unauthorized`:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "detail": "Invalid credentials"
}
```

Authentication identifies the account, but individual models may have separate access restrictions. A model unavailable to the authenticated account can return `404`, `423`, or `503` depending on its operational state.


# Billing and retention
Source: https://docs.higgsfield.ai/docs/concepts/billing-and-retention

Understand charging, refunds, estimation, and output retention.

Higgsfield charges successful generation requests using account credits. The exact cost depends on the selected model and parameters.

## Credit expiration

Credits expire one year after they are added to your account balance. Plan purchases and usage with this expiration period in mind.

## Estimate a request

Use the estimate endpoint with the same model parameters before submitting generation:

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/estimate/higgsfield-ai/soul/v2/standard \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{
    "prompt": "Editorial portrait in soft daylight"
  }'
```

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "credits": "1.500",
  "usd": "0.094"
}
```

> [!NOTE]
>
> The values above illustrate the response format. Use the estimate returned for your authenticated account as the authoritative amount.

## Failed and moderated requests

Requests ending as `failed` or `nsfw` are not charged. If credits were reserved when the request was accepted, they are refunded automatically.

## Canceled requests

A request can be canceled only before processing starts. A successfully canceled queued request is refunded.

## Output retention

Generated output is accessible for at least seven days after creation and may be removed after that period. Download completed files to your own storage for long-term retention.


# Errors and retries
Source: https://docs.higgsfield.ai/docs/concepts/errors

Handle synchronous API errors and terminal generation failures.

Errors can occur before a request is accepted or later during generation.

## Synchronous errors

Most HTTP errors use the FastAPI error envelope:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "detail": "Invalid credentials"
}
```

Validation errors may return a list in `detail`. Do not parse human-readable messages to make permanent business decisions.

| Status | Typical meaning | Retry? |
| - | - | :-: |
| `400` | Invalid parameters or rejected input | After correcting the request |
| `401` | Missing or invalid credentials | No |
| `403` | Insufficient credits | After funding the account |
| `404` | Request or model not found for this account | No |
| `422` | Request validation failed or an idempotency key was reused with different parameters | No |
| `423` | Model is temporarily blocked | Later |
| `429` | Endpoint limit reached; see [Rate limits](/docs/concepts/rate-limits) | After `Retry-After` |
| `500` | Unexpected server error | Yes, with backoff |
| `503` | Model is disabled or not ready | Later |

## Terminal failures

An accepted request can later finish with `failed` or `nsfw`:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "failed",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "error": "Generation failed"
}
```

Failed and NSFW requests are not charged; any reserved credits are refunded.

## Safe retry policy

* Retry `GET` status requests after network failures and `5xx` responses.
* Do not retry authentication or validation failures without changing the request.
* Use exponential backoff with jitter.
* Set maximum attempts and a total retry deadline.
* Send an [`Idempotency-Key`](/docs/concepts/idempotency) with every generation submission.
* After an ambiguous timeout, network failure, or `5xx`, repeat the same generation request with the same idempotency key.

Every API response includes an `X-Correlation-ID` header. Record it with the `request_id` and include both when contacting support.


# File uploads
Source: https://docs.higgsfield.ai/docs/concepts/file-uploads

Upload images, video, or audio for use as model input.

Use a presigned upload URL when your input media is not already available through a public HTTPS URL.

## 1. Create an upload URL

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
UPLOAD=$(curl --silent --show-error --fail-with-body \
  --request POST \
  --url https://api.higgsfield.ai/files/generate-upload-url \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{"content_type":"image/jpeg"}')

echo "$UPLOAD" | jq
```

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "public_url": "https://cdn.example.com/input/example.jpeg",
  "upload_url": "https://storage.example.com/presigned-upload-url",
  "content_type": "image/jpeg",
  "upload_headers": {
    "Content-Type": "image/jpeg",
    "x-amz-tagging": "retention=temporary"
  }
}
```

The upload URL expires after one hour.

## 2. Upload the file

Send the file to `upload_url` with every header returned in `upload_headers`.

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request PUT \
  --url "$(echo "$UPLOAD" | jq --raw-output '.upload_url')" \
  --header "Content-Type: $(echo "$UPLOAD" | jq --raw-output '.upload_headers["Content-Type"]')" \
  --header "x-amz-tagging: $(echo "$UPLOAD" | jq --raw-output '.upload_headers["x-amz-tagging"]')" \
  --upload-file ./input.jpg
```

Do not send Higgsfield API credentials to the presigned storage URL.

## 3. Use the public URL

Pass `public_url` in the model parameter that accepts an input URL, such as `image_url`, `video_url`, or `audio_url`.

## Supported content types

* `image/jpeg`, `image/jpg`, `image/png`, `image/webp`, `image/gif`
* `audio/wav`, `audio/x-wav`
* `video/mp4`

The content type used for the upload must match the value used to create the presigned URL.


# Idempotent requests
Source: https://docs.higgsfield.ai/docs/concepts/idempotency

Retry generation submissions safely without creating duplicate requests.

Generation submissions accept an optional `Idempotency-Key` header. Use it when a network failure or timeout leaves you unsure whether a request was accepted.

Generate one unique key for each intended generation and keep it until you receive the initial response:

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
export IDEMPOTENCY_KEY=$(uuidgen | tr '[:upper:]' '[:lower:]')

curl --request POST \
  --url https://api.higgsfield.ai/higgsfield-ai/soul/v2/standard \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
    "prompt": "A quiet alpine lake at sunrise, editorial photography"
  }'
```

If the response is lost, repeat the same request with the same key. Higgsfield returns the original `request_id` without creating or charging for another generation.

## Key rules

* Keys must contain 1–255 visible ASCII characters without whitespace. UUIDs are recommended.
* A key identifies one generation intent within your account. API key rotation does not change that identity.
* Reuse the key only when the endpoint, JSON body, and webhook are unchanged.
* JSON object field order does not matter. Array order, omitted fields, explicit `null` values, and different URLs do matter.
* A completed, failed, NSFW, or canceled request keeps its identity. Retrying does not restart it.
* A request rejected before acceptance, such as an authentication or validation failure, does not consume the key.

> [!WARNING]
>
> Create a new key when you deliberately want a new generation, even if its parameters are identical to an earlier request.

## Parameter mismatch

Reusing a key with different request parameters returns `422 Unprocessable Entity`:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "detail": "Idempotency-Key was already used with different request parameters"
}
```

Do not handle this response by generating a new key automatically. First determine whether the changed request represents a deliberate new generation or a client bug.

## Retry after an ambiguous failure

1. Create the key before sending the generation request.
2. Store the key with your local operation or job record.
3. After a network error, timeout, or `5xx`, retry the same endpoint and parameters with the same key.
4. Store the returned `request_id` and use its `status_url` for subsequent checks.

The replay response is an acceptance receipt and can contain `"status": "queued"` even when the original request has already finished. Read `status_url` for its current status and output.

Idempotency keys apply to generation submission endpoints in the Model API reference. Status polling, cancellation, uploads, estimates, and webhook deliveries use their existing retry behavior.


# Polling
Source: https://docs.higgsfield.ai/docs/concepts/polling

Poll request status without creating unnecessary load or duplicate generations.

Poll the `status_url` returned by the submission response until the request reaches a terminal state.

## Recommended strategy

1. Start with a two-second interval.
2. Increase the interval gradually up to ten seconds.
3. Add random jitter when many workers poll concurrently.
4. Stop on `completed`, `failed`, `nsfw`, or `canceled`.
5. Set an application-level timeout appropriate for the selected model.

```python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import random
import time

import httpx

terminal_statuses = {"completed", "failed", "nsfw", "canceled"}
delay = 2.0

while True:
    response = httpx.get(
        status_url,
        headers={"Authorization": f"Key {key_id}:{key_secret}"},
        timeout=30,
    )
    response.raise_for_status()
    result = response.json()

    if result["status"] in terminal_statuses:
        break

    time.sleep(delay + random.uniform(0, 0.5))
    delay = min(delay * 1.5, 10.0)
```

## Retry decisions

| Response | Recommended action |
| - | - |
| `200` with a non-terminal status | Continue polling with backoff. |
| `401` | Stop and fix the credentials. |
| `404` | Stop and verify the request ID and account. |
| `5xx` or network failure | Retry the status request with exponential backoff. |

For long-running production workloads, use [webhooks](/docs/how-to/webhooks) and keep polling as a recovery path.


# Rate limits
Source: https://docs.higgsfield.ai/docs/concepts/rate-limits

Design integrations for account and model concurrency limits.

Rate limits depend on the account and the selected model. View the limits assigned to your account in [Higgsfield Console](https://console.higgsfield.ai).

The primary generation limit is concurrency: the number of requests that may be processing at the same time. Some models can also have model-specific limits.

## When concurrency is reached

Generation requests above your concurrency limit are still accepted. The API returns a `request_id` with status `queued`, and the request starts automatically when one of your running requests reaches a terminal status.

## Endpoint-specific limits

Some non-generation endpoints reject requests above their limit instead of queuing them. They return `429 Too Many Requests` with a `Retry-After` header:

| Endpoint | Limit |
| - | - |
| `POST /v1/custom-references` | Number of Soul ID references training at the same time |

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "detail": "Maximum number of concurrent requests (2) has been reached"
}
```

## Client recommendations

* On `429`, wait for the number of seconds in `Retry-After` before submitting again.
* Limit generation submissions with a worker pool or semaphore so the queue stays short.
* Track each accepted `request_id` until it becomes terminal.
* Use backoff and jitter instead of retrying in a tight loop.
* Keep polling traffic separate from generation submission concurrency.
* Let us know in [Discord](https://discord.gg/BEea92KeR9) before a planned traffic increase if you need higher limits.

> [!NOTE]
>
> Successful responses do not yet include rate-limit headers with your remaining capacity. Treat the limits shown in your dashboard as the authoritative values for your account.


# Requests and lifecycle
Source: https://docs.higgsfield.ai/docs/concepts/requests

Understand asynchronous generation requests and their terminal states.

Generation is asynchronous. A successful submission creates a request and returns immediately while the work continues in the background.

## Request lifecycle

| Status | Terminal | Meaning |
| - | :-: | - |
| `queued` | No | The request is waiting to start and may still be canceled. |
| `in_progress` | No | Generation has started and can no longer be canceled. |
| `completed` | Yes | Output URLs are available in the response. |
| `failed` | Yes | Generation failed. The response may include an `error`. |
| `nsfw` | Yes | Input or output was rejected by content moderation. |
| `canceled` | Yes | The request was canceled before processing started. |

Store the `request_id` as soon as a request is accepted. It is the stable identifier used by polling, cancellation, webhook deduplication, and support.

> [!TIP]
>
> Send an [`Idempotency-Key`](/docs/concepts/idempotency) with generation submissions so an ambiguous timeout can be retried without creating a duplicate request.

## Initial response

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "status_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/status",
  "cancel_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/cancel"
}
```

Use the URLs from the response instead of constructing them manually.

## Completed output

The output field depends on the model's output type.

```json Image theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "images": [
    { "url": "https://cdn.example.com/image-1.jpg" },
    { "url": "https://cdn.example.com/image-2.jpg" }
  ]
}
```

```json Video theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "video": {
    "url": "https://cdn.example.com/video.mp4"
  }
}
```

```json Audio theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "audio": {
    "url": "https://cdn.example.com/audio.mp3"
  },
  "audios": [
    { "url": "https://cdn.example.com/audio.mp3" }
  ]
}
```

Some video and 3D operations can return additional artifacts such as `zip`, `mov`, `jsx`, `fbx`, or `ply`.

## Cancel a request

Cancellation is available only while every job in the request remains queued.

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url "https://api.higgsfield.ai/requests/${REQUEST_ID}/cancel" \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

A successful cancellation returns `202 Accepted` with an empty body. If processing has started, the API returns `400 Bad Request`.

> [!NOTE]
>
> Output URLs are retained for at least seven days. Copy completed media to your own storage if you need it for longer.


# FAQ
Source: https://docs.higgsfield.ai/docs/help/faq

Answers about Higgsfield API authentication, asynchronous requests, model selection, billing, limits, and output retention.

# Frequently Asked Questions

> **What base URL and authentication header should I use?**
>
> Send requests to `https://api.higgsfield.ai` and authenticate server-side with `Authorization: Key YOUR_KEY_ID:YOUR_KEY_SECRET`. Do not use a Bearer token or expose the secret in browser or mobile code. See [Authentication](/docs/authentication).

> **Why does a generation request not return the media immediately?**
>
> Generation is asynchronous. A successful submission returns `request_id`, `status_url`, and `cancel_url`. Poll `status_url` or configure a webhook, then read the output URL after the status becomes `completed`. See [Requests and lifecycle](/docs/concepts/requests).

> **Which model or endpoint should I use?**
>
> Choose by input and output workflow: text-to-image, image editing, text-to-video, image-to-video, or frame-controlled video. Model availability depends on your account. Not sure which endpoint fits your case? Ask in our [Discord](https://discord.gg/BEea92KeR9).

> **What is the retention policy for generated output files?**
>
> Generated output files are stored and accessible for a minimum of 7 days from the time of creation. We strongly recommend downloading and storing files in your own infrastructure for long-term retention. Files may be removed from our servers at any time after the 7-day retention period.

> **Are failed requests charged?**
>
> No. Failed generation requests are not charged to your account. You are only billed for successful completions. In the event of a failure, any credits or costs associated with that request are automatically refunded.

> **What does NSFW status mean?**
>
> NSFW (Not Safe For Work) indicates that either your input parameters or the generated output did not pass our content moderation system due to content policy violations. Content policy rules and restrictions may vary depending on the specific model being used.

> **Are NSFW-flagged requests charged?**
>
> No. Requests flagged as NSFW are not charged to your account. When content is rejected by our moderation system, any associated credits or costs are automatically refunded.

> **Do you offer invoice-based billing?**
>
> The API runs on pay-as-you-go by default: you top up a balance and pay per generation. Invoice-based billing is available for customers on a committed-use contract. To discuss one, [contact sales](https://open.higgsfield.ai/contact-sales).

> **What are the API rate limits?**
>
> Rate limits depend on your account and the selected model. You can view your current limits and usage in your [dashboard](https://console.higgsfield.ai). Need a higher limit? Let us know in our [Discord](https://discord.gg/BEea92KeR9).

> **How do I monitor my API usage?**
>
> You can monitor your API usage, credit consumption, and request history through the [Higgsfield Console dashboard](https://console.higgsfield.ai). The dashboard provides real-time analytics and detailed usage reports.

> **Which programming languages are supported?**
>
> We provide official Python and Node.js/TypeScript SDKs. You can also integrate directly through the REST API from any language with an HTTP client. See [Client libraries](/docs/how-to/sdk).

> **How do I get started with the API?**
>
> To get started:
>
> 1. Create an account at [console.higgsfield.ai](https://console.higgsfield.ai)
>
> 2. Generate your API credentials from the dashboard
>
> 3. Follow our [Quickstart](/docs/quickstart) for your first integration
>
> 4. Read [How the API works](/docs/how-to/introduction), then use a generation endpoint available to your account

> **What happens if a generation takes too long?**
>
> Generation requests have model-specific timeout limits. If a request exceeds the timeout, it will be marked as failed and you will not be charged. You can resubmit the request. If timeouts keep happening, reach out in our [Discord](https://discord.gg/BEea92KeR9) with your `request_id`.

## Still have questions?

If you didn't find your answer, here is where to go next:

* **Discord community**: [Join the Higgsfield Discord](https://discord.gg/BEea92KeR9) and ask your question there
* **Account and billing**: email [support@higgsfield.ai](mailto:support@higgsfield.ai)
* **Documentation**: [Read the Quickstart](/docs/quickstart)
* **API Reference**: [Request endpoint reference](/docs/api-reference/overview)


# Support
Source: https://docs.higgsfield.ai/docs/help/support

Get help with the Higgsfield API

Need help with the Higgsfield API? The Higgsfield team and the developer community are on Discord.

## Contact us

The fastest way to get help is our Discord server:

> **[Join the Higgsfield Discord](https://discord.gg/BEea92KeR9)**
>
> Ask in the Discord community. The Higgsfield team and other developers are there to help.

We can help with:

* Technical issues and troubleshooting
* API integration questions
* Choosing a model or endpoint
* Feature requests and feedback

For account, billing, or invoice questions, email [support@higgsfield.ai](mailto:support@higgsfield.ai) and the team will follow up with you directly.

### Before you post

* Check [status.higgsfield.ai](https://status.higgsfield.ai) for ongoing incidents
* Include the `request_id` and the `X-Correlation-ID` response header of the failing request (see [Errors and retries](/docs/concepts/errors))
* Include the model or endpoint and the time of the request (UTC)

> [!WARNING]
>
> Never share your API key secret, payment details, or personal data in public channels. If we need account details, a team member will continue with you in a private message.

## Documentation

Before reaching out, check the documentation:

> **[Quick Start](/docs/quickstart)**
>
> Get started with the Higgsfield API in minutes

> **[API Reference](/docs/api-reference/overview)**
>
> Complete API endpoint documentation

> **[Client Libraries](/docs/how-to/sdk)**
>
> Official SDKs for Python and TypeScript

> **[Request lifecycle](/docs/concepts/requests)**
>
> Understand asynchronous requests and results

## Resources

### API Dashboard

Manage your API keys, monitor usage, and view analytics at [console.higgsfield.ai](https://console.higgsfield.ai)

### Status Page

Check the current status of Higgsfield services and view incident history at our status page: [status.higgsfield.ai](https://status.higgsfield.ai)

### GitHub

* **Python SDK**: [higgsfield-ai/higgsfield-client](https://github.com/higgsfield-ai/higgsfield-client)
* **TypeScript SDK**: [higgsfield-ai/higgsfield-js](https://github.com/higgsfield-ai/higgsfield-js)
* Found a bug in an SDK? Open an issue in its repository. For everything else, reach out in [Discord](https://discord.gg/BEea92KeR9).

## Feedback

We read all feedback. Let us know how we can improve:

* Share ideas and suggestions in the [Discord community](https://discord.gg/BEea92KeR9)
* Report SDK bugs on [GitHub](https://github.com/higgsfield-ai/higgsfield-client)

***

**Need a quick answer?** Ask in [Discord](https://discord.gg/BEea92KeR9) or start with the [Quickstart](/docs/quickstart).


# How the API works
Source: https://docs.higgsfield.ai/docs/how-to/introduction

Learn the common authentication and asynchronous request lifecycle shared by Higgsfield image and video models.

The Higgsfield API uses an asynchronous request lifecycle:

1. Submit JSON parameters to a model endpoint.
2. Store the returned `request_id`.
3. Poll `status_url` or wait for a webhook.
4. Download output when the request becomes `completed`.

> **[Start with the Quickstart](/docs/quickstart)**
>
> Run a complete request using cURL.

> **[Understand requests](/docs/concepts/requests)**
>
> Learn statuses, output shapes, cancellation, and retention.

**Base URL:** `https://api.higgsfield.ai`

Every request requires server-side [authentication](/docs/authentication). For production integrations, read the [polling](/docs/concepts/polling), [webhook](/docs/how-to/webhooks), and [error handling](/docs/concepts/errors) guides.


# Client libraries
Source: https://docs.higgsfield.ai/docs/how-to/sdk

Use the official Python and TypeScript SDKs.

Official SDKs handle authentication, submission, polling, cancellation, and file uploads. Use them only in trusted server-side environments.

> **[Python](https://github.com/higgsfield-ai/higgsfield-client)**
>
> Synchronous and asynchronous APIs for Python 3.8+.

> **[Node.js and TypeScript](https://github.com/higgsfield-ai/higgsfield-js)**
>
> Typed server-side client with automatic polling and retries.

## Python

### Install

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
pip install higgsfield-client
```

### Configure credentials

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
export HF_KEY="your-api-key-id:your-api-key-secret"
```

### Submit and wait

```python Synchronous theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

result = higgsfield_client.subscribe(
    "higgsfield-ai/soul/v2/standard",
    arguments={
        "prompt": "Editorial portrait in soft daylight",
    },
)

print(result["images"][0]["url"])
```

```python Asynchronous theme={"theme":{"light":"github-light","dark":"github-dark"}}
import asyncio

import higgsfield_client


async def main():
    result = await higgsfield_client.subscribe_async(
        "higgsfield-ai/soul/v2/standard",
        arguments={
            "prompt": "Editorial portrait in soft daylight",
        },
    )
    print(result["images"][0]["url"])


asyncio.run(main())
```

Use `submit` or `submit_async` when you need a request controller for explicit polling, status checks, or cancellation. The Python SDK also provides `upload`, `upload_file`, and `upload_image` helpers.

## Node.js and TypeScript

### Install

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
npm install @higgsfield/client
```

### Configure credentials

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
export HF_CREDENTIALS="your-api-key-id:your-api-key-secret"
```

### Submit and wait

```typescript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({
  credentials: process.env.HF_CREDENTIALS,
});

const result = await higgsfield.subscribe(
  "higgsfield-ai/soul/v2/standard",
  {
    input: {
      prompt: "Editorial portrait in soft daylight",
    },
    withPolling: true,
  },
);

if (result.status === "completed") {
  console.log(result.images?.[0]?.url);
}
```

The v2 TypeScript client is server-side only and blocks browser use to prevent credential exposure.

## Choose an integration style

| Requirement | Recommended API |
| - | - |
| Script or prototype | `subscribe` / `subscribe_async` |
| Worker with explicit lifecycle control | `submit` / `submit_async` |
| Existing request ID | `status`, `result`, or `cancel` |
| Production event-driven integration | Submit with a webhook and keep status polling as recovery |

See the [Python SDK repository](https://github.com/higgsfield-ai/higgsfield-client) and [TypeScript SDK repository](https://github.com/higgsfield-ai/higgsfield-js) for the complete client APIs.


# Webhooks
Source: https://docs.higgsfield.ai/docs/how-to/webhooks

Receive terminal generation results without continuous polling.

Pass an HTTPS endpoint in the `hf_webhook` query parameter when submitting generation. Higgsfield sends one or more HTTP `POST` deliveries after the request reaches `completed`, `failed`, or `nsfw`.

## Configure a webhook

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url "https://api.higgsfield.ai/higgsfield-ai/soul/v2/standard?hf_webhook=https%3A%2F%2Fexample.com%2Fwebhooks%2Fhiggsfield" \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{
    "prompt": "Editorial portrait in soft daylight"
  }'
```

Your endpoint must be publicly reachable over HTTPS, accept a JSON request body, and respond within ten seconds.

## Payload envelope

All deliveries use the same top-level envelope. Successful output is nested in `payload`.

```json Completed image theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "request_id": "9417a243-e457-4075-895b-b68f3cda5303",
  "status": "completed",
  "error": null,
  "payload": {
    "images": [
      {
        "url": "https://cdn.example.com/generated-image.jpg",
        "content_type": "image/jpeg"
      }
    ]
  }
}
```

```json Completed video theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "request_id": "9417a243-e457-4075-895b-b68f3cda5303",
  "status": "completed",
  "error": null,
  "payload": {
    "video": {
      "url": "https://cdn.example.com/generated-video.mp4",
      "content_type": "video/mp4"
    }
  }
}
```

```json Failed theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "request_id": "9417a243-e457-4075-895b-b68f3cda5303",
  "status": "failed",
  "error": "Generation failed",
  "payload": null
}
```

```json NSFW theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "request_id": "9417a243-e457-4075-895b-b68f3cda5303",
  "status": "nsfw",
  "error": null,
  "payload": null
}
```

Audio responses contain `payload.audio`. Some video and 3D operations can also include `zip`, `mov`, `jsx`, `fbx`, or `ply` artifacts.

## Delivery and retries

* Return any `2xx` response after durably recording the event.
* Network failures and `5xx` responses are retried for up to two hours.
* `4xx` responses are treated as permanent and are not retried.
* Duplicate deliveries are possible. Deduplicate by `request_id` and terminal `status`.
* If delivery fails permanently, retrieve the result through the authenticated status endpoint.

Reject request bodies that do not match the documented envelope, but acknowledge valid duplicate deliveries with `2xx`.


# Higgsfield API
Source: https://docs.higgsfield.ai/docs/index

Generate images and videos through one authenticated, asynchronous API.

Higgsfield provides one integration point for generative media models. Submit a request to a model endpoint, then poll for the result or receive a webhook when processing finishes.

> **[Run your first request](/docs/quickstart)**
>
> Create credentials and complete a generation from submission to result.

> **[Get an API key](https://console.higgsfield.ai)**
>
> Create and manage server-side credentials in Higgsfield Console.

## Make a request

Every model uses the same authentication and asynchronous request lifecycle. The JSON body depends on the selected model.

Start with [Genjutsu motion transfer](/docs/models/genjutsu/motion-transfer). Replace the example media URLs with publicly accessible URLs for your own video and reference image. The source video must be at least 4 seconds long.

```bash Genjutsu theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/genjutsu/motion-transfer/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{
    "video_url": "https://example.com/input.mp4",
    "image_urls": ["https://example.com/input.jpg"]
  }'
```

```bash SOUL V2 theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield-ai/soul/v2/standard \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{
    "prompt": "Editorial portrait in soft daylight"
  }'
```

The API immediately returns a request identifier and links for checking or canceling the request.

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "status_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/status",
  "cancel_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/cancel"
}
```

## Choose your path

> **[Build a prototype](/docs/how-to/sdk)**
>
> Use the Python or TypeScript SDK to submit a request and wait for its result.

> **[Ship to production](/docs/concepts/requests)**
>
> Learn the request lifecycle, polling, webhooks, errors, and limits.

> **[Upload media](/docs/concepts/file-uploads)**
>
> Upload input files to Higgsfield storage before generation.

> [!NOTE]
>
> Output files are available for at least seven days. Download completed output to your own storage for long-term retention.


# Model API Reference
Source: https://docs.higgsfield.ai/docs/models

Choose a Higgsfield image or video model and open its API reference or Playground.

Use the Higgsfield API to generate images and videos with leading foundation models through one asynchronous request lifecycle.

## Choose a model category

▶

Video Generation API
Genjutsu, Seedance, Kling, Wan, Happy Horse, Cinema Studio, MiniMax, LTX, PixVerse, and Grok.

↗

[Open](/docs/models/video-generation)

◇

Image Generation API
SOUL, Soul ID training, Marketing Studio, Ads Studio, Grok, Recraft, Qwen Image, Ideogram, and Z-Image.

↗

[Open](/docs/models/image-generation)

## How the catalog works

The sidebar is organized by output type and model family. Every workflow page includes its request schema, required fields, supported values, examples, and response instructions. Generation endpoints also link to the API Playground.

> [!NOTE]
>
> Endpoint fields vary by model and workflow. Use the exact schema documented on the selected model page.

## Availability

The catalog documents 84 entries: 17 Image and 67 Video. Soul ID is a training workflow. Availability and access can change; check the [API Console](https://console.higgsfield.ai) for your account.


# Ads Studio API
Source: https://docs.higgsfield.ai/docs/models/ads-studio

Turn a marketing brief and optional product references into 1–8 ad concepts rendered as images with GPT Image 2.5 Flare.

Turn a marketing brief and optional product references into 1–8 ad concepts rendered as images with GPT Image 2.5 Flare.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Generate ads](/docs/models/ads-studio/generate) | `POST /higgsfield/ads-studio/v1.0` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Ads Studio — Generate ads API
Source: https://docs.higgsfield.ai/docs/models/ads-studio/generate

Generate ads with Ads Studio: request parameters, examples and response handling.

[← Ads Studio](/docs/models/ads-studio)

**Endpoint:** `POST https://api.higgsfield.ai/higgsfield/ads-studio/v1.0`

**Endpoint ID:** `higgsfield/ads-studio/v1.0`

[▶
Open API PlaygroundAds Studio · Generate ads
↗](https://console.higgsfield.ai/models/higgsfield%2Fads-studio%2Fv1.0/playground)

## Usage notes

* Submit one request with your brief. Ad concepts are prepared automatically, then rendered as images; no separate preparation or generate call is required.
* batch\_size selects 1–8 ad concepts. Each concept produces one image, so a fully successful batch returns batch\_size images.
* Rendering uses GPT Image 2.5 Flare with fixed 2k resolution and high quality. Exact dimensions depend on aspect\_ratio. quality, resolution, renderer and fallback model are not public inputs.
* All outputs in a batch use the requested aspect\_ratio. Omitting it selects 1:1. The value auto is not supported.
* Set HF\_API\_KEY\_ID and HF\_API\_KEY\_SECRET to your API credentials. Set a unique IDEMPOTENCY\_KEY for each intended generation; reuse it only when retrying that same request.

## Quick start

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/ads-studio/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "Create two distinct ads for a fictional herbal tea called Quiet Evening. Use a green tea tin, warm light and the headline Make time for yourself. No people.",
  "target_audience": "Busy professionals looking for a relaxing evening ritual",
  "niche": "Herbal tea",
  "language": "en",
  "aspect_ratio": "9:16",
  "batch_size": 2
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'Create two distinct ads for a fictional herbal tea called Quiet '
               'Evening. Use a green tea tin, warm light and the headline Make '
               'time for yourself. No people.',
     'target_audience': 'Busy professionals looking for a relaxing evening ritual',
     'niche': 'Herbal tea',
     'language': 'en',
     'aspect_ratio': '9:16',
     'batch_size': 2}
)
result = higgsfield_client.subscribe(
    "higgsfield/ads-studio/v1.0",
    arguments=arguments,
)
print(result["images"][0]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("higgsfield/ads-studio/v1.0", {
  input:
    {
      "prompt": "Create two distinct ads for a fictional herbal tea called Quiet Evening. Use a green tea tin, warm light and the headline Make time for yourself. No people.",
      "target_audience": "Busy professionals looking for a relaxing evening ritual",
      "niche": "Herbal tea",
      "language": "en",
      "aspect_ratio": "9:16",
      "batch_size": 2
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.images?.[0]?.url);
}
```

## Input schema

**niche** `string`

Optional product category or business niche used to guide ad concepts.
Maximum characters: `1000`.

**prompt** `string` *required*

Required marketing brief describing the product or service, desired message and visual direction. Must contain non-whitespace text.
Minimum characters: `1`.
Maximum characters: `8000`.
Pattern: `\S`.

**language** `string`

Optional language guidance for ad copy, for example en or ru. This is free text, not a fixed language-code enum.
Maximum characters: `80`.

**batch\_size** `integer` (default: 1)

Number of ad concepts and requested output images. Billing is summed across the rendered images.
Minimum: `1`.
Maximum: `8`.

**image\_urls** `array` (default: \[])

Optional product or visual reference images. Supply up to 10 directly downloadable HTTP(S) URLs. Omit or send \[] for text-only generation.
Maximum items: `10`.
Each item: string. Minimum characters: `1`. Maximum characters: `8192`. Pattern: `^https?://`.

**aspect\_ratio** `string` (default: 1:1)

Output width-to-height ratio shared by every image in the batch.
Allowed values: `"1:1"`, `"4:5"`, `"5:4"`, `"16:9"`, `"9:16"`, `"4:3"`, `"3:4"`, `"21:9"`, `"3:2"`, `"2:3"`, `"2:1"`, `"1:2"`, `"3:1"`, `"1:3"`.

**target\_audience** `string`

Optional description of the intended audience, such as interests, needs or use cases.
Maximum characters: `2000`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "niche": {
>       "type": "string",
>       "default": "",
>       "maxLength": 1000
>     },
>     "prompt": {
>       "type": "string",
>       "pattern": "\\S",
>       "maxLength": 8000,
>       "minLength": 1
>     },
>     "language": {
>       "type": "string",
>       "default": "",
>       "maxLength": 80
>     },
>     "batch_size": {
>       "type": "integer",
>       "default": 1,
>       "maximum": 8,
>       "minimum": 1
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "pattern": "^https?://",
>         "maxLength": 8192,
>         "minLength": 1
>       },
>       "default": [],
>       "maxItems": 10
>     },
>     "aspect_ratio": {
>       "enum": [
>         "1:1",
>         "4:5",
>         "5:4",
>         "16:9",
>         "9:16",
>         "4:3",
>         "3:4",
>         "21:9",
>         "3:2",
>         "2:3",
>         "2:1",
>         "1:2",
>         "3:1",
>         "1:3"
>       ],
>       "type": "string",
>       "default": "1:1"
>     },
>     "target_audience": {
>       "type": "string",
>       "default": "",
>       "maxLength": 2000
>     }
>   },
>   "additionalProperties": false
> }
> ```

## Product references

Omit `image_urls` for text-only generation. To guide the ad with your product, send direct image URLs that the service can download without browser cookies or custom authentication headers. An unexpired signed HTTPS URL is suitable. Keep the URLs valid while the request is being processed.

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "prompt": "Create three distinct premium perfume ads. Preserve the bottle and label. Use the headline Leave a lasting note.",
  "image_urls": ["https://example.com/product.png"],
  "target_audience": "People looking for a distinctive gift",
  "niche": "Fragrance",
  "language": "en",
  "aspect_ratio": "4:5",
  "batch_size": 3
}
```

Reference images guide generation; exact preservation of a product, label or text is not guaranteed. Supported oversized references are normalized before rendering. The output remains a PNG at the selected aspect ratio.

## Pricing

**Illustrative estimate: approximately \$0.084 per image.** This is a budgeting example, not a fixed charge or maximum price. Actual cost varies with the aspect ratio, prepared prompt, reference images and measured token usage. Consult the current model pricing in the Playground before submitting work.

| Token category | USD per 1 million tokens |
| - | -: |
| Text input | \$5.00 |
| Cached text input | \$1.25 |
| Text output | \$10.00 |
| Image input | \$8.00 |
| Cached image input | \$2.00 |
| Image output | \$30.00 |

The initial charge is an estimate reconciled to actual rendering usage on completion, with standard credit rounding. Cached input is charged at the cached rate instead of being counted again as uncached input. Ad concept preparation is not billed separately.

For a batch, the final price is the **sum of the actual image charges**. Do not multiply aggregated batch token usage by `batch_size` again. Three images at the illustrative estimate would budget approximately \$0.252; the actual total can differ.

## Check request status

Use the returned `status_url` with the same API credentials. Set `REQUEST_ID` to the identifier returned when you submit the request:

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request GET \
  --url "https://api.higgsfield.ai/requests/${REQUEST_ID}/status" \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

Follow the shared [polling guidance](/docs/concepts/polling). A request handle confirms acceptance, not successful image generation. Stop polling on `completed`, `failed`, `nsfw`, or `canceled`, and inspect the returned outputs and errors.

## Response

Submission returns one request handle for the entire batch:

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A fully successful two-image batch returns two indexed images:

```json Completed theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel",
  "status": "completed",
  "images": [
    {"index": 0, "url": "https://example.com/ad-1.png"},
    {"index": 1, "url": "https://example.com/ad-2.png"}
  ],
  "errors": []
}
```

Process every returned image rather than only `images[0]`. Use its zero-based `index` to identify its batch slot and inspect `errors` for unsuccessful slots. After `subscribe` returns, extend the Python quick start with:

```python theme={"theme":{"light":"github-light","dark":"github-dark"}}
for image in result.get("images", []):
    print(image["index"], image["url"])
for error in result.get("errors", []):
    print(error)
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Cinema Studio 4.0 API
Source: https://docs.higgsfield.ai/docs/models/cinema-studio-4

Create video shots with camera and style controls and media references.

Create video shots with camera and style controls and media references.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Generate](/docs/models/cinema-studio-4/generate) | `POST /higgsfield/cinema-studio/4.0` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Cinema Studio 4.0 — Generate API
Source: https://docs.higgsfield.ai/docs/models/cinema-studio-4/generate

Generate with Cinema Studio 4.0: request parameters, examples and response handling.

[← Cinema Studio 4.0](/docs/models/cinema-studio-4)

**Endpoint:** `POST https://api.higgsfield.ai/higgsfield/cinema-studio/4.0`

**Endpoint ID:** `higgsfield/cinema-studio/4.0`

[▶
Open API PlaygroundCinema Studio 4.0 · Generate
↗](https://console.higgsfield.ai/models/higgsfield%2Fcinema-studio%2F4.0/playground)

## Usage notes

* This is the public Cinema Studio 4.0 workflow. It uses text-to-video when references are absent and reference-to-video when any media array is nonempty.
* Omit creative-control fields to let the director choose them automatically; the literal value "auto" is not accepted for these enum fields.
* Optional prompt references use one-based tokens such as \<\<\<image\_1>>>, \<\<\<video\_1>>> and \<\<\<audio\_1>>>. Each token must refer to an attached item of the same media type.
* This endpoint produces a new video. Editing and extension use the separate Seedance 2.5 endpoints.
* Reference media are limited to 30 images, 10 videos and 10 audio files, with at most 50 items total. Video and audio may be normalized to separate 30-second total budgets.

## Quick start

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/cinema-studio/4.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.'}
)
result = higgsfield_client.subscribe(
    "higgsfield/cinema-studio/4.0",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("higgsfield/cinema-studio/4.0", {
  input:
    {
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**era** `string`

Allowed values: `"1960s"`, `"1980s"`, `"1990s"`, `"2000s"`, `"2020s"`.

**genre** `string`

Allowed values: `"epic"`, `"drama"`, `"noir"`, `"comedy"`, `"horror"`, `"action"`.

**light** `string`

Allowed values: `"silhouette"`, `"practicals"`, `"window"`, `"overhead-fall"`, `"contre-jour"`, `"soft-cross"`.

**pacing** `string`

Allowed values: `"chaotic"`, `"dynamic"`, `"calm"`, `"single-shot"`.

**prompt** `string` *required*

Text instructions for the generation or edit.
Minimum characters: `1`.
Pattern: `\S`.

**duration** `integer` (default: 5)

Requested output duration in seconds.
Minimum: `4`.
Maximum: `30`.

**audio\_urls** `array`

Ordered public audio reference URLs.
Maximum items: `10`.
Each item: string. Format: `uri`.

**image\_urls** `array`

Ordered public image reference URLs.
Maximum items: `30`.
Each item: string. Format: `uri`.

**resolution** `string` (default: 720p)

Output resolution tier.
Allowed values: `"480p"`, `"720p"`.

**video\_urls** `array`

Ordered public video reference URLs.
Maximum items: `10`.
Each item: string. Format: `uri`.

**camera\_lens** `string`

Allowed values: `"clean-sharp"`, `"anamorphic"`, `"vintage-anamorphic"`, `"warm-vintage"`, `"halation-vintage"`.

**aspect\_ratio** `string` (default: 16:9)

Output width-to-height ratio.
Allowed values: `"16:9"`, `"4:3"`, `"1:1"`, `"3:4"`, `"9:16"`, `"21:9"`.

**camera\_model** `string`

Allowed values: `"modern"`, `"35mm-film"`, `"8mm-film"`, `"dv-camcorder"`.

**color\_palette** `string`

Allowed values: `"static-noon"`, `"twilight-fable"`, `"back-row-kissing-seats"`, `"on-the-other-side-of-the-porthole"`, `"the-emerald-ambush"`, `"highway-standoff"`, `"the-faded-fresco"`, `"oil-ochre"`, `"the-mountain-convent"`, `"ghost-in-the-code"`, `"pink-velvet"`, `"two-days-to-the-horizon"`, `"industrial-fog"`, `"stairs-go-up"`, `"field-post"`, `"home-is-the-next-gas-station"`, `"glossy-flesh"`, `"the-crimson-ballet"`, `"neon-rain-at-midnight"`, `"the-morning-after-rain"`, `"the-iron-borough"`, `"the-ground"`, `"the-investigation"`, `"turquoise-mirage"`, `"a-dream-in-color"`, `"breakfast-on-schedule"`, `"favela-gold"`, `"a-hotel-for-one"`, `"after-dark"`, `"crimson-vigi"`, `"the-neighbors-saw-everything"`, `"the-grey-channel"`, `"mirage-at-noon"`, `"bubblegum-boulevard"`, `"yellow-room"`, `"the-earth-keeps-things-reluctantly"`, `"tropic-fever-dream"`, `"bioluminescent-night"`, `"dont-turn-it-off-im-watching"`, `"the-silk-curtain-falls"`, `"the-butterfly"`, `"playtime"`, `"wallpaper-romance"`, `"overtime"`, `"the-way-home-is-longer"`, `"everyone-speaks-in-whispers"`, `"runaway-summer"`, `"amber-wasteland"`, `"the-circus"`, `"gasoline-sunset"`.

**generate\_audio** `boolean` (default: true)

Generate audio with the video.

**camera\_aperture** `string`

Allowed values: `"f14-wide-open"`, `"f4-moderate"`, `"f11-deep-focus"`.

**camera\_movement** `string`

Allowed values: `"snorricam"`, `"robot-arm"`, `"tilt-up"`, `"rack-focus"`, `"tilt-down"`, `"pov"`, `"pan-left"`, `"crane-up"`, `"pan-right"`, `"crane-down"`, `"side-tracking"`, `"pedestal-up"`, `"pedestal-down"`, `"handheld"`, `"tracking"`, `"drone-orbit"`, `"dolly-zoom"`, `"aerial-pullback"`, `"static-shot"`, `"bullet-time"`, `"whip-pan"`, `"slow-zoom-in"`, `"arc-left"`, `"slow-zoom-out"`, `"arc-right"`, `"truck-right"`, `"dolly-in"`, `"truck-left"`, `"dolly-out"`, `"slider-right"`, `"crush-zoom"`, `"slider-left"`, `"helicopter-shot"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "era": {
>       "enum": [
>         "1960s",
>         "1980s",
>         "1990s",
>         "2000s",
>         "2020s"
>       ],
>       "type": "string"
>     },
>     "genre": {
>       "enum": [
>         "epic",
>         "drama",
>         "noir",
>         "comedy",
>         "horror",
>         "action"
>       ],
>       "type": "string"
>     },
>     "light": {
>       "enum": [
>         "silhouette",
>         "practicals",
>         "window",
>         "overhead-fall",
>         "contre-jour",
>         "soft-cross"
>       ],
>       "type": "string"
>     },
>     "pacing": {
>       "enum": [
>         "chaotic",
>         "dynamic",
>         "calm",
>         "single-shot"
>       ],
>       "type": "string"
>     },
>     "prompt": {
>       "type": "string",
>       "pattern": "\\S",
>       "minLength": 1
>     },
>     "duration": {
>       "type": "integer",
>       "default": 5,
>       "maximum": 30,
>       "minimum": 4
>     },
>     "audio_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri"
>       },
>       "maxItems": 10
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri"
>       },
>       "maxItems": 30
>     },
>     "resolution": {
>       "enum": [
>         "480p",
>         "720p"
>       ],
>       "type": "string",
>       "default": "720p"
>     },
>     "video_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri"
>       },
>       "maxItems": 10
>     },
>     "camera_lens": {
>       "enum": [
>         "clean-sharp",
>         "anamorphic",
>         "vintage-anamorphic",
>         "warm-vintage",
>         "halation-vintage"
>       ],
>       "type": "string"
>     },
>     "aspect_ratio": {
>       "enum": [
>         "16:9",
>         "4:3",
>         "1:1",
>         "3:4",
>         "9:16",
>         "21:9"
>       ],
>       "type": "string",
>       "default": "16:9"
>     },
>     "camera_model": {
>       "enum": [
>         "modern",
>         "35mm-film",
>         "8mm-film",
>         "dv-camcorder"
>       ],
>       "type": "string"
>     },
>     "color_palette": {
>       "enum": [
>         "static-noon",
>         "twilight-fable",
>         "back-row-kissing-seats",
>         "on-the-other-side-of-the-porthole",
>         "the-emerald-ambush",
>         "highway-standoff",
>         "the-faded-fresco",
>         "oil-ochre",
>         "the-mountain-convent",
>         "ghost-in-the-code",
>         "pink-velvet",
>         "two-days-to-the-horizon",
>         "industrial-fog",
>         "stairs-go-up",
>         "field-post",
>         "home-is-the-next-gas-station",
>         "glossy-flesh",
>         "the-crimson-ballet",
>         "neon-rain-at-midnight",
>         "the-morning-after-rain",
>         "the-iron-borough",
>         "the-ground",
>         "the-investigation",
>         "turquoise-mirage",
>         "a-dream-in-color",
>         "breakfast-on-schedule",
>         "favela-gold",
>         "a-hotel-for-one",
>         "after-dark",
>         "crimson-vigi",
>         "the-neighbors-saw-everything",
>         "the-grey-channel",
>         "mirage-at-noon",
>         "bubblegum-boulevard",
>         "yellow-room",
>         "the-earth-keeps-things-reluctantly",
>         "tropic-fever-dream",
>         "bioluminescent-night",
>         "dont-turn-it-off-im-watching",
>         "the-silk-curtain-falls",
>         "the-butterfly",
>         "playtime",
>         "wallpaper-romance",
>         "overtime",
>         "the-way-home-is-longer",
>         "everyone-speaks-in-whispers",
>         "runaway-summer",
>         "amber-wasteland",
>         "the-circus",
>         "gasoline-sunset"
>       ],
>       "type": "string"
>     },
>     "generate_audio": {
>       "type": "boolean",
>       "default": true
>     },
>     "camera_aperture": {
>       "enum": [
>         "f14-wide-open",
>         "f4-moderate",
>         "f11-deep-focus"
>       ],
>       "type": "string"
>     },
>     "camera_movement": {
>       "enum": [
>         "snorricam",
>         "robot-arm",
>         "tilt-up",
>         "rack-focus",
>         "tilt-down",
>         "pov",
>         "pan-left",
>         "crane-up",
>         "pan-right",
>         "crane-down",
>         "side-tracking",
>         "pedestal-up",
>         "pedestal-down",
>         "handheld",
>         "tracking",
>         "drone-orbit",
>         "dolly-zoom",
>         "aerial-pullback",
>         "static-shot",
>         "bullet-time",
>         "whip-pan",
>         "slow-zoom-in",
>         "arc-left",
>         "slow-zoom-out",
>         "arc-right",
>         "truck-right",
>         "dolly-in",
>         "truck-left",
>         "dolly-out",
>         "slider-right",
>         "crush-zoom",
>         "slider-left",
>         "helicopter-shot"
>       ],
>       "type": "string"
>     }
>   },
>   "additionalProperties": false
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Genjutsu API
Source: https://docs.higgsfield.ai/docs/models/genjutsu

Transfer motion, replace objects, or restyle a source video.

Transfer motion, replace objects, or restyle a source video.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Motion transfer](/docs/models/genjutsu/motion-transfer) | `POST /higgsfield/genjutsu/motion-transfer/v1.0` |
| [Object swap](/docs/models/genjutsu/object-swap) | `POST /higgsfield/genjutsu/object-swap/v1.0` |
| [Restyle](/docs/models/genjutsu/restyle) | `POST /higgsfield/genjutsu/restyle/v1.0` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Genjutsu — Motion transfer API
Source: https://docs.higgsfield.ai/docs/models/genjutsu/motion-transfer

Motion transfer with Genjutsu: request parameters, examples and response handling.

[← Genjutsu](/docs/models/genjutsu)

**Endpoint:** `POST https://api.higgsfield.ai/higgsfield/genjutsu/motion-transfer/v1.0`

**Endpoint ID:** `higgsfield/genjutsu/motion-transfer/v1.0`

[▶
Open API PlaygroundGenjutsu · Motion transfer
↗](https://console.higgsfield.ai/models/higgsfield%2Fgenjutsu%2Fmotion-transfer%2Fv1.0/playground)

## Usage notes

* Use higgsfield/genjutsu/motion-transfer/v1.0 for new integrations. The legacy endpoint higgsfiled/genjutsu/motion-transfer/v1.0 remains callable for existing clients but is hidden from model discovery.
* The source video must be at least 4 seconds. Videos longer than 30 seconds are trimmed to 30 seconds; output duration follows the prepared source video.
* Provide 1–8 image references. The prompt is optional and defaults to an empty string.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/genjutsu/motion-transfer/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "video_url": "https://example.com/input.mp4",
  "image_urls": [
    "https://example.com/input.jpg"
  ]
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'video_url': 'https://example.com/input.mp4',
     'image_urls': ['https://example.com/input.jpg']}
)
result = higgsfield_client.subscribe(
    "higgsfield/genjutsu/motion-transfer/v1.0",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("higgsfield/genjutsu/motion-transfer/v1.0", {
  input:
    {
      "video_url": "https://example.com/input.mp4",
      "image_urls": [
        "https://example.com/input.jpg"
      ]
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string`

Text instructions for the generation or edit.
Maximum characters: `10000`.

**video\_url** `string` *required*

Public URL of the source video.
Minimum characters: `1`.
Maximum characters: `2083`.
Format: `uri`.

**image\_urls** `array` *required*

Ordered public image reference URLs.
Minimum items: `1`.
Maximum items: `8`.
Each item: string. Minimum characters: `1`. Maximum characters: `2083`. Format: `uri`.

**resolution** `string` (default: 720p)

Output resolution tier.
Allowed values: `"720p"`, `"480p"`, `"1080p"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "MotionTransferParams",
>   "required": [
>     "video_url",
>     "image_urls"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "default": "",
>       "maxLength": 10000
>     },
>     "video_url": {
>       "type": "string",
>       "title": "Video Url",
>       "format": "uri",
>       "maxLength": 2083,
>       "minLength": 1
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri",
>         "maxLength": 2083,
>         "minLength": 1
>       },
>       "title": "Image Urls",
>       "maxItems": 8,
>       "minItems": 1
>     },
>     "resolution": {
>       "enum": [
>         "720p",
>         "480p",
>         "1080p"
>       ],
>       "type": "string",
>       "title": "Resolution",
>       "default": "720p"
>     }
>   },
>   "additionalProperties": false
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Genjutsu — Object swap API
Source: https://docs.higgsfield.ai/docs/models/genjutsu/object-swap

Object swap with Genjutsu: request parameters, examples and response handling.

[← Genjutsu](/docs/models/genjutsu)

**Endpoint:** `POST https://api.higgsfield.ai/higgsfield/genjutsu/object-swap/v1.0`

**Endpoint ID:** `higgsfield/genjutsu/object-swap/v1.0`

[▶
Open API PlaygroundGenjutsu · Object swap
↗](https://console.higgsfield.ai/models/higgsfield%2Fgenjutsu%2Fobject-swap%2Fv1.0/playground)

## Usage notes

* Use higgsfield/genjutsu/object-swap/v1.0 for new integrations. The legacy endpoint higgsfiled/genjutsu/object-swap/v1.0 remains callable for existing clients but is hidden from model discovery.
* The source video must be at least 4 seconds. Videos longer than 30 seconds are trimmed to 30 seconds; output duration follows the prepared source video.
* Provide 1–8 image references. The prompt is optional and defaults to an empty string.
* The source video must contain at least 409,600 pixels per frame (width × height).

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/genjutsu/object-swap/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "video_url": "https://example.com/input.mp4",
  "image_urls": [
    "https://example.com/input.jpg"
  ]
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'video_url': 'https://example.com/input.mp4',
     'image_urls': ['https://example.com/input.jpg']}
)
result = higgsfield_client.subscribe(
    "higgsfield/genjutsu/object-swap/v1.0",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("higgsfield/genjutsu/object-swap/v1.0", {
  input:
    {
      "video_url": "https://example.com/input.mp4",
      "image_urls": [
        "https://example.com/input.jpg"
      ]
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string`

Text instructions for the generation or edit.
Maximum characters: `10000`.

**video\_url** `string` *required*

Public URL of the source video.
Minimum characters: `1`.
Maximum characters: `2083`.
Format: `uri`.

**image\_urls** `array` *required*

Ordered public image reference URLs.
Minimum items: `1`.
Maximum items: `8`.
Each item: string. Minimum characters: `1`. Maximum characters: `2083`. Format: `uri`.

**resolution** `string` (default: 720p)

Output resolution tier.
Allowed values: `"720p"`, `"480p"`, `"1080p"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "ObjectSwapParams",
>   "required": [
>     "video_url",
>     "image_urls"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "default": "",
>       "maxLength": 10000
>     },
>     "video_url": {
>       "type": "string",
>       "title": "Video Url",
>       "format": "uri",
>       "maxLength": 2083,
>       "minLength": 1
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri",
>         "maxLength": 2083,
>         "minLength": 1
>       },
>       "title": "Image Urls",
>       "maxItems": 8,
>       "minItems": 1
>     },
>     "resolution": {
>       "enum": [
>         "720p",
>         "480p",
>         "1080p"
>       ],
>       "type": "string",
>       "title": "Resolution",
>       "default": "720p"
>     }
>   },
>   "additionalProperties": false
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Genjutsu — Restyle API
Source: https://docs.higgsfield.ai/docs/models/genjutsu/restyle

Restyle with Genjutsu: request parameters, examples and response handling.

[← Genjutsu](/docs/models/genjutsu)

**Endpoint:** `POST https://api.higgsfield.ai/higgsfield/genjutsu/restyle/v1.0`

**Endpoint ID:** `higgsfield/genjutsu/restyle/v1.0`

[▶
Open API PlaygroundGenjutsu · Restyle
↗](https://console.higgsfield.ai/models/higgsfield%2Fgenjutsu%2Frestyle%2Fv1.0/playground)

## Usage notes

* Restyle changes the visual style of a source video while retaining its motion, shot composition, and source audio. Each request produces one video.
* Select a current style from GET /models/higgsfield/genjutsu/restyle/v1.0/presets and send its UUID as preset\_id. The example UUID below is illustrative of a published preset; fetch the current catalog before submitting.
* The source must be at least 4 seconds and no larger than 200 MiB. Videos longer than 30 seconds are trimmed to their first 30 seconds, including audio.
* Character references are optional: omit image\_urls or send \[] to restyle the existing source subjects. Supply up to 5 character images to guide their appearance.
* Defaults apply to omitted optional fields. Use \[] or an empty string where appropriate; null is not accepted.
* Output framing is derived from the source and animation cadence can depend on the selected style. Exact output duration and FPS may differ from the source.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/genjutsu/restyle/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "video_url": "https://example.com/input.mp4",
  "preset_id": "c2143317-f28d-4c3c-a0b8-39bd547e08a7",
  "image_urls": [],
  "prompt": "Preserve the original movement and camera composition.",
  "resolution": "720p"
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'video_url': 'https://example.com/input.mp4',
     'preset_id': 'c2143317-f28d-4c3c-a0b8-39bd547e08a7',
     'image_urls': [],
     'prompt': 'Preserve the original movement and camera composition.',
     'resolution': '720p'}
)
result = higgsfield_client.subscribe(
    "higgsfield/genjutsu/restyle/v1.0",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("higgsfield/genjutsu/restyle/v1.0", {
  input:
    {
      "video_url": "https://example.com/input.mp4",
      "preset_id": "c2143317-f28d-4c3c-a0b8-39bd547e08a7",
      "image_urls": [],
      "prompt": "Preserve the original movement and camera composition.",
      "resolution": "720p"
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string`

Optional additional guidance for the final video alongside the preset, source motion, and character references. Describe subject roles or details to retain, for example: “Keep the referenced character’s pink hair consistent across shots.” An empty string uses the visual inputs without additional instructions. This supplements preset\_id; it does not create a custom style or set duration, resolution, FPS, or audio behavior. Instructions guide a generative result and do not guarantee exact preservation.
Maximum characters: `10000`.

**preset\_id** `string` *required*

Required UUID from items\[].id in the [available styles](#available-styles) response. Selects one visual style for the subjects and scene. Send the ID, not the style name, preview URL, or list index. A prompt or character image does not replace this field. Hidden or unavailable presets fail input preparation; no alternative style is selected automatically. Custom/personal presets and multiple simultaneous styles are not supported.
Format: `uuid`.

**video\_url** `string` *required*

Direct URL of the source video that supplies motion, camera movement, composition, and the source scene. It must be downloadable without browser cookies or custom authentication headers; an unexpired signed HTTPS URL is suitable. Minimum duration: 4 seconds. Maximum download size: 200 MiB (209,715,200 bytes), including files that will be trimmed. Longer clips use only their first 30 seconds; trim your upload first if you need another segment. Use a decodable video such as MP4, not a player page or local file path. Original audio is retained when present; there is no new-soundtrack control.
Minimum characters: `1`.
Format: `uri`.

**image\_urls** `array` (default: \[])

Optional character appearance references, in a stable order. Omit this field or send \[] to derive the styled subjects and scene from the source video. With references, each character image is restyled and the source background is cleaned and styled separately before video generation. Each URL must point directly to a downloadable image; JPEG and PNG are practical choices. Maximum download size: 64 MiB (67,108,864 bytes) per image. Images are normalized, so their dimensions do not set the output video size. These are character references, not style previews or background-only inputs. For multiple characters, describe the intended roles in prompt; the public API provides no explicit reference-to-person mapping.
Maximum items: `5`.
Each item: string. Minimum characters: `1`. Format: `uri`.

**resolution** `string` (default: 720p)

Output resolution tier; strings are case-sensitive. Defaults to 720p. Send a supported string such as "720p", not the number 720 or "HD". This setting selects the video price tier and does not set the aspect ratio, duration, or FPS.
Allowed values: `"480p"`, `"720p"`, `"1080p"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Genjutsu Restyle",
>   "required": [
>     "video_url",
>     "preset_id"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "default": "",
>       "maxLength": 10000
>     },
>     "preset_id": {
>       "type": "string",
>       "title": "Style preset",
>       "format": "uuid"
>     },
>     "video_url": {
>       "type": "string",
>       "title": "Source video",
>       "format": "uri",
>       "minLength": 1,
>       "description": "Source video, 4–30 seconds. Longer videos are trimmed to 30 seconds."
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "format": "uri",
>         "minLength": 1
>       },
>       "title": "Character images",
>       "default": [],
>       "maxItems": 5,
>       "description": "Optional character references. Leave empty to restyle the source frame."
>     },
>     "resolution": {
>       "enum": [
>         "480p",
>         "720p",
>         "1080p"
>       ],
>       "type": "string",
>       "title": "Resolution",
>       "default": "720p"
>     }
>   },
>   "additionalProperties": false
> }
> ```

## Available styles

Styles are called **presets** in the API. Fetch the catalog before selecting a style:

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --fail-with-body --silent --show-error \
  'https://api.higgsfield.ai/models/higgsfield/genjutsu/restyle/v1.0/presets' \
  -H "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

No request body, query parameters, or pagination parameters are needed. The endpoint requires authentication and access to the Restyle model. It returns all currently selectable system presets, ordered by name and ID. Hidden or unusable presets are omitted; personal/custom styles are not included.

Example response, shortened to one item:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "model": "higgsfield/genjutsu/restyle/v1.0",
  "items": [
    {
      "id": "c2143317-f28d-4c3c-a0b8-39bd547e08a7",
      "name": "Cel-Shaded CG Anime",
      "preview_url": "https://cdn.higgsfield.ai/restyle_presets/259d7ddb-4201-49f7-8a91-cee5bce28715.webp"
    }
  ]
}
```

| Response field | Meaning |
| - | - |
| `model` | The generation model to which this catalog belongs. |
| `items` | Array of available styles. Treat an empty array as no selectable styles. |
| `items[].id` | Style UUID. Copy this value into the generation request's `preset_id`. |
| `items[].name` | Human-readable style name for a menu or style picker. |
| `items[].preview_url` | Style preview image for display. This is not the value of `preset_id` and does not need to be sent in `image_urls`. |

Select exactly one item. Use its `id`, not its name, list position, or preview URL. The example ID above was available when this documentation was written; always use the current catalog in your application. If a saved selection disappears, refresh the list and select an available style.

## Character references

Without `image_urls`, Restyle takes the existing source subject and scene as its appearance reference. With `image_urls`, it styles each supplied character image and prepares a styled background from the source scene. In both cases, `video_url` supplies the motion and `preset_id` supplies the visual style.

For example, use this generation body to include a character reference. Replace the media URLs and select a current preset ID:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "video_url": "https://example.com/input.mp4",
  "preset_id": "c2143317-f28d-4c3c-a0b8-39bd547e08a7",
  "image_urls": ["https://example.com/character.png"],
  "prompt": "Keep the referenced character consistent across shots while preserving the original movement.",
  "resolution": "1080p"
}
```

There are only five public model inputs: `video_url`, `preset_id`, `image_urls`, `prompt`, and `resolution`. Batch size, duration, aspect ratio, FPS, scene mode, a separate background image, seed, and provider selection are not exposed by this model.

## Approximate pricing

| Resolution | Approximate price per source-video second |
| - | - |
| `480p` | \$0.318 |
| `720p` | \$0.681 |
| `1080p` | \$1.632 |

These are approximate per-second rates, not an exact total quote. Source duration is rounded up to whole seconds after trimming to 30 seconds: an 8.1-second source is billed as 9 seconds.

## Check request status

The same API key is used to list styles, submit generation, and poll the result. Set `HF_API_KEY_ID` and `HF_API_KEY_SECRET` to your API credentials. Set a unique `IDEMPOTENCY_KEY` for each intended generation, and reuse it only when retrying that request.

After submission, poll the returned `status_url`, or set `REQUEST_ID` to the returned ID:

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --fail-with-body --silent --show-error \
  "https://api.higgsfield.ai/requests/${REQUEST_ID}/status" \
  -H "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

A request can be `queued` or `in_progress` before it completes. Stop polling on `completed`, `failed`, `nsfw`, or `canceled`. A failed response includes an `error` message. Media download and unavailable-preset errors can occur after acceptance; a request handle alone does not mean that generation succeeded. Keep signed media URLs valid while inputs are fetched.

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Grok Image 2.0 API
Source: https://docs.higgsfield.ai/docs/models/grok-image-2

Generate and edit images with up to ten image references.

Generate and edit images with up to ten image references.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Generate and edit](/docs/models/grok-image-2/generate-and-edit) | `POST /xai/grok-imagine-image-2.0` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Grok Image 2.0 — Generate and edit API
Source: https://docs.higgsfield.ai/docs/models/grok-image-2/generate-and-edit

Generate and edit with Grok Image 2.0: request parameters, examples and response handling.

[← Grok Image 2.0](/docs/models/grok-image-2)

**Endpoint:** `POST https://api.higgsfield.ai/xai/grok-imagine-image-2.0`

**Endpoint ID:** `xai/grok-imagine-image-2.0`

[▶
Open API PlaygroundGrok Image 2.0 · Generate and edit
↗](https://console.higgsfield.ai/models/xai%2Fgrok-imagine-image-2.0/playground)

## Usage notes

* Supports both text-to-image and editing: omit image\_urls for generation, or supply up to 10 references for editing.
* quality accepts low or medium only; resolution accepts 1k or 2k. aspect\_ratio defaults to auto.
* Reference images may be resized during preprocessing before submission. The request produces one image; no batch count is declared.

## Quick start

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/xai/grok-imagine-image-2.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A ceramic vase on a wooden table beside a sunlit window, soft natural shadows, editorial photograph.",
  "resolution": "1k",
  "aspect_ratio": "1:1",
  "quality": "medium"
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A ceramic vase on a wooden table beside a sunlit window, soft '
               'natural shadows, editorial photograph.',
     'resolution': '1k',
     'aspect_ratio': '1:1',
     'quality': 'medium'}
)
result = higgsfield_client.subscribe(
    "xai/grok-imagine-image-2.0",
    arguments=arguments,
)
print(result["images"][0]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("xai/grok-imagine-image-2.0", {
  input:
    {
      "prompt": "A ceramic vase on a wooden table beside a sunlit window, soft natural shadows, editorial photograph.",
      "resolution": "1k",
      "aspect_ratio": "1:1",
      "quality": "medium"
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.images?.[0]?.url);
}
```

## Input schema

**prompt** `string` *required*

Write your prompt here

**quality** `string` (default: medium)

Allowed values: `"low"`, `"medium"`.

**image\_urls** `array`

Ordered public image reference URLs.
Minimum items: `0`.
Maximum items: `10`.
Each item: string. Format: `uri`.

**resolution** `string` (default: 1k)

Output resolution tier.
Allowed values: `"1k"`, `"2k"`.

**aspect\_ratio** `string` (default: auto)

Output width-to-height ratio.
Allowed values: `"auto"`, `"1:1"`, `"1:2"`, `"2:1"`, `"3:2"`, `"2:3"`, `"4:3"`, `"3:4"`, `"16:9"`, `"9:16"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Grok Imagine 2.0 Playground",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "quality": {
>       "enum": [
>         "low",
>         "medium"
>       ],
>       "type": "string",
>       "title": "Quality",
>       "default": "medium"
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "title": "Image",
>         "format": "uri"
>       },
>       "title": "Input Images",
>       "maxItems": 10,
>       "minItems": 0
>     },
>     "resolution": {
>       "enum": [
>         "1k",
>         "2k"
>       ],
>       "type": "string",
>       "title": "Resolution",
>       "default": "1k"
>     },
>     "aspect_ratio": {
>       "enum": [
>         "auto",
>         "1:1",
>         "1:2",
>         "2:1",
>         "3:2",
>         "2:3",
>         "4:3",
>         "3:4",
>         "16:9",
>         "9:16"
>       ],
>       "type": "string",
>       "default": "auto"
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "images": [
    {
      "url": "https://example.com/output.png"
    }
  ]
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Grok Imagine Video 1.5 API
Source: https://docs.higgsfield.ai/docs/models/grok-video-1-5

Generate videos from text, images or an audio reference.

Generate videos from text, images or an audio reference.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Reference to video](/docs/models/grok-video-1-5/reference-to-video) | `POST /xai/grok-imagine-video/v1.5/reference-to-video` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Grok Imagine Video 1.5 — Reference to video API
Source: https://docs.higgsfield.ai/docs/models/grok-video-1-5/reference-to-video

Reference to video with Grok Imagine Video 1.5: request parameters, examples and response handling.

[← Grok Imagine Video 1.5](/docs/models/grok-video-1-5)

**Endpoint:** `POST https://api.higgsfield.ai/xai/grok-imagine-video/v1.5/reference-to-video`

**Endpoint ID:** `xai/grok-imagine-video/v1.5/reference-to-video`

[▶
Open API PlaygroundGrok Imagine Video 1.5 · Reference to video
↗](https://console.higgsfield.ai/models/xai%2Fgrok-imagine-video%2Fv1.5%2Freference-to-video/playground)

## Usage notes

* This endpoint also accepts text-only requests or one first-frame image. Choose either image\_url or reference media (image\_urls/audio\_url); do not combine these modes.
* When image\_urls or audio\_url is provided, resolution must be 480p or 720p. The shared schema also lists 1080p, which is rejected in reference mode.
* Input images must decode as JPEG, PNG, WebP or GIF; SVG and XML are unsupported.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/xai/grok-imagine-video/v1.5/reference-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement.",
  "image_urls": [
    "https://example.com/input.jpg"
  ]
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.',
     'image_urls': ['https://example.com/input.jpg']}
)
result = higgsfield_client.subscribe(
    "xai/grok-imagine-video/v1.5/reference-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("xai/grok-imagine-video/v1.5/reference-to-video", {
  input:
    {
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement.",
      "image_urls": [
        "https://example.com/input.jpg"
      ]
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string` *required*

Write your prompt here

**duration** `integer` (default: 5)

Requested output duration in seconds.
Minimum: `1`.
Maximum: `15`.

**audio\_url** `string`

Public URL of the audio reference.
Format: `uri`.

**image\_url** `string`

Public URL of the input image.
Format: `uri`.

**image\_urls** `array`

Ordered public image reference URLs.
Minimum items: `0`.
Maximum items: `7`.
Each item: string. Format: `uri`.

**resolution** `string` (default: 480p)

Output resolution tier.
Allowed values: `"480p"`, `"720p"`, `"1080p"`.

**aspect\_ratio** `string` (default: auto)

Output width-to-height ratio.
Allowed values: `"auto"`, `"1:1"`, `"16:9"`, `"9:16"`, `"4:3"`, `"3:4"`, `"3:2"`, `"2:3"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Grok Imagine Video 1.5 Reference Playground",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "type": "integer",
>       "title": "Duration",
>       "default": 5,
>       "maximum": 15,
>       "minimum": 1
>     },
>     "audio_url": {
>       "type": "string",
>       "title": "Reference audio",
>       "format": "uri"
>     },
>     "image_url": {
>       "type": "string",
>       "title": "First-frame image",
>       "format": "uri"
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "title": "Image",
>         "format": "uri"
>       },
>       "title": "Reference images",
>       "maxItems": 7,
>       "minItems": 0
>     },
>     "resolution": {
>       "enum": [
>         "480p",
>         "720p",
>         "1080p"
>       ],
>       "type": "string",
>       "title": "Resolution",
>       "default": "480p"
>     },
>     "aspect_ratio": {
>       "enum": [
>         "auto",
>         "1:1",
>         "16:9",
>         "9:16",
>         "4:3",
>         "3:4",
>         "3:2",
>         "2:3"
>       ],
>       "type": "string",
>       "default": "auto"
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Hailuo 2.3 API
Source: https://docs.higgsfield.ai/docs/models/hailuo-2-3

Generate videos from text or an image with Hailuo 2.3 Standard.

Generate videos from text or an image with Hailuo 2.3 Standard.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Standard text to video](/docs/models/hailuo-2-3/standard-text-to-video) | `POST /minimax/hailuo-2.3/standard/text-to-video` |
| [Standard image to video](/docs/models/hailuo-2-3/standard-image-to-video) | `POST /minimax/hailuo-2.3/standard/image-to-video` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# Hailuo 2.3 — Standard image to video API
Source: https://docs.higgsfield.ai/docs/models/hailuo-2-3/standard-image-to-video

Standard image to video with Hailuo 2.3: request parameters, examples and response handling.

[← Hailuo 2.3](/docs/models/hailuo-2-3)

**Endpoint:** `POST https://api.higgsfield.ai/minimax/hailuo-2.3/standard/image-to-video`

**Endpoint ID:** `minimax/hailuo-2.3/standard/image-to-video`

[▶
Open API PlaygroundHailuo 2.3 · Standard image to video
↗](https://console.higgsfield.ai/models/minimax%2Fhailuo-2.3%2Fstandard%2Fimage-to-video/playground)

## Usage notes

* This Standard endpoint uses a fixed 768P output resolution; resolution is not a configurable field in the production schema.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/minimax/hailuo-2.3/standard/image-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement.",
  "image_url": "https://example.com/input.jpg"
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.',
     'image_url': 'https://example.com/input.jpg'}
)
result = higgsfield_client.subscribe(
    "minimax/hailuo-2.3/standard/image-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("minimax/hailuo-2.3/standard/image-to-video", {
  input:
    {
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement.",
      "image_url": "https://example.com/input.jpg"
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string` *required*

Write your prompt here

**duration** `integer` (default: 6)

Requested output duration in seconds.
Allowed values: `6`, `10`.

**image\_url** `string` *required*

Public URL of the input image.
Format: `uri`.

**prompt\_optimizer** `boolean` (default: true)

See the complete JSON schema below.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Minimax Hailuo 2.3 Playground",
>   "required": [
>     "prompt",
>     "image_url"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "enum": [
>         6,
>         10
>       ],
>       "type": "integer",
>       "title": "Duration",
>       "default": 6
>     },
>     "image_url": {
>       "type": "string",
>       "title": "Image URL",
>       "format": "uri"
>     },
>     "prompt_optimizer": {
>       "type": "boolean",
>       "title": "Prompt optimizer",
>       "default": true
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Hailuo 2.3 — Standard text to video API
Source: https://docs.higgsfield.ai/docs/models/hailuo-2-3/standard-text-to-video

Standard text to video with Hailuo 2.3: request parameters, examples and response handling.

[← Hailuo 2.3](/docs/models/hailuo-2-3)

**Endpoint:** `POST https://api.higgsfield.ai/minimax/hailuo-2.3/standard/text-to-video`

**Endpoint ID:** `minimax/hailuo-2.3/standard/text-to-video`

[▶
Open API PlaygroundHailuo 2.3 · Standard text to video
↗](https://console.higgsfield.ai/models/minimax%2Fhailuo-2.3%2Fstandard%2Ftext-to-video/playground)

## Usage notes

* This Standard endpoint uses a fixed 768P output resolution; resolution is not a configurable field in the production schema.

## Quick start

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/minimax/hailuo-2.3/standard/text-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.'}
)
result = higgsfield_client.subscribe(
    "minimax/hailuo-2.3/standard/text-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("minimax/hailuo-2.3/standard/text-to-video", {
  input:
    {
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**prompt** `string` *required*

Write your prompt here

**duration** `integer` (default: 6)

Requested output duration in seconds.
Allowed values: `6`, `10`.

**prompt\_optimizer** `boolean` (default: true)

See the complete JSON schema below.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Minimax Hailuo 2.3 Playground",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "enum": [
>         6,
>         10
>       ],
>       "type": "integer",
>       "title": "Duration",
>       "default": 6
>     },
>     "prompt_optimizer": {
>       "type": "boolean",
>       "title": "Prompt optimizer",
>       "default": true
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Happy Horse 1.0 API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1

Generate videos from text, a starting image or reference images.

Generate videos from text, a starting image or reference images.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Text to video](/docs/models/happy-horse-1/text-to-video) | `POST /alibaba/happy-horse/text-to-video` |
| [Image to video](/docs/models/happy-horse-1/image-to-video) | `POST /alibaba/happy-horse/image-to-video` |
| [Reference to video](/docs/models/happy-horse-1/reference-to-video) | `POST /alibaba/happy-horse/reference-to-video` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# HappyHorse 1.1 API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1-1

Generate videos from text, a starting image or reference images.

Generate videos from text, a starting image or reference images.

## Workflows

| Workflow | Endpoint |
| - | - |
| [Text to video](/docs/models/happy-horse-1-1/text-to-video) | `POST /alibaba/happy-horse/v1.1/text-to-video` |
| [Image to video](/docs/models/happy-horse-1-1/image-to-video) | `POST /alibaba/happy-horse/v1.1/image-to-video` |
| [Reference to video](/docs/models/happy-horse-1-1/reference-to-video) | `POST /alibaba/happy-horse/v1.1/reference-to-video` |

Open a workflow to see its complete input schema, required fields, supported values and request examples.


# HappyHorse 1.1 — Image to video API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1-1/image-to-video

Image to video with HappyHorse 1.1: request parameters, examples and response handling.

[← HappyHorse 1.1](/docs/models/happy-horse-1-1)

**Endpoint:** `POST https://api.higgsfield.ai/alibaba/happy-horse/v1.1/image-to-video`

**Endpoint ID:** `alibaba/happy-horse/v1.1/image-to-video`

[▶
Open API PlaygroundHappyHorse 1.1 · Image to video
↗](https://console.higgsfield.ai/models/alibaba%2Fhappy-horse%2Fv1.1%2Fimage-to-video/playground)

## Usage notes

* The prompt is optional. This endpoint accepts one first-frame image; it does not support a last-frame image.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/alibaba/happy-horse/v1.1/image-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "image_url": "https://example.com/input.jpg"
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'image_url': 'https://example.com/input.jpg'}
)
result = higgsfield_client.subscribe(
    "alibaba/happy-horse/v1.1/image-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("alibaba/happy-horse/v1.1/image-to-video", {
  input:
    {
      "image_url": "https://example.com/input.jpg"
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**seed** `integer`

Seed used to control generation randomness.
Minimum: `1`.
Maximum: `2147483646`.

**prompt** `string`

Write your prompt here

**duration** `integer` (default: 5)

Requested output duration in seconds.
Minimum: `2`.
Maximum: `15`.

**image\_url** `string` *required*

Public URL of the input image.
Format: `uri`.

**resolution** `string` (default: 1080p)

Output resolution tier.
Allowed values: `"720p"`, `"1080p"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Happy horse",
>   "required": [
>     "image_url"
>   ],
>   "properties": {
>     "seed": {
>       "type": "integer",
>       "maximum": 2147483646,
>       "minimum": 1
>     },
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "type": "integer",
>       "title": "Duration",
>       "default": 5,
>       "maximum": 15,
>       "minimum": 2
>     },
>     "image_url": {
>       "type": "string",
>       "title": "Image URL",
>       "format": "uri"
>     },
>     "resolution": {
>       "enum": [
>         "720p",
>         "1080p"
>       ],
>       "type": "string",
>       "default": "1080p"
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# HappyHorse 1.1 — Reference to video API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1-1/reference-to-video

Reference to video with HappyHorse 1.1: request parameters, examples and response handling.

[← HappyHorse 1.1](/docs/models/happy-horse-1-1)

**Endpoint:** `POST https://api.higgsfield.ai/alibaba/happy-horse/v1.1/reference-to-video`

**Endpoint ID:** `alibaba/happy-horse/v1.1/reference-to-video`

[▶
Open API PlaygroundHappyHorse 1.1 · Reference to video
↗](https://console.higgsfield.ai/models/alibaba%2Fhappy-horse%2Fv1.1%2Freference-to-video/playground)

## Usage notes

* Provide 1–9 reference images. This limit is enforced at submission even though the stored JSON Schema does not set minItems or maxItems. Reference videos are unsupported.

## Quick start

Replace the example media URLs with publicly accessible URLs for your own files before submitting.

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/alibaba/happy-horse/v1.1/reference-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "image_urls": [
    "https://example.com/input.jpg"
  ],
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'image_urls': ['https://example.com/input.jpg'],
     'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.'}
)
result = higgsfield_client.subscribe(
    "alibaba/happy-horse/v1.1/reference-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("alibaba/happy-horse/v1.1/reference-to-video", {
  input:
    {
      "image_urls": [
        "https://example.com/input.jpg"
      ],
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**seed** `integer`

Seed used to control generation randomness.
Minimum: `1`.
Maximum: `2147483646`.

**prompt** `string` *required*

Write your prompt here

**duration** `integer` (default: 5)

Requested output duration in seconds.
Minimum: `2`.
Maximum: `15`.

**image\_urls** `array` *required*

Ordered public image reference URLs.
Each item: string. Format: `uri`.

**resolution** `string` (default: 1080p)

Output resolution tier.
Allowed values: `"720p"`, `"1080p"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Happy horse",
>   "required": [
>     "image_urls",
>     "prompt"
>   ],
>   "properties": {
>     "seed": {
>       "type": "integer",
>       "maximum": 2147483646,
>       "minimum": 1
>     },
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "type": "integer",
>       "title": "Duration",
>       "default": 5,
>       "maximum": 15,
>       "minimum": 2
>     },
>     "image_urls": {
>       "type": "array",
>       "items": {
>         "type": "string",
>         "title": "Image URL",
>         "format": "uri"
>       }
>     },
>     "resolution": {
>       "enum": [
>         "720p",
>         "1080p"
>       ],
>       "type": "string",
>       "default": "1080p"
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# HappyHorse 1.1 — Text to video API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1-1/text-to-video

Text to video with HappyHorse 1.1: request parameters, examples and response handling.

[← HappyHorse 1.1](/docs/models/happy-horse-1-1)

**Endpoint:** `POST https://api.higgsfield.ai/alibaba/happy-horse/v1.1/text-to-video`

**Endpoint ID:** `alibaba/happy-horse/v1.1/text-to-video`

[▶
Open API PlaygroundHappyHorse 1.1 · Text to video
↗](https://console.higgsfield.ai/models/alibaba%2Fhappy-horse%2Fv1.1%2Ftext-to-video/playground)

## Usage notes

* The prompt must contain text; an empty string is rejected during submission.

## Quick start

```bash cURL theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/alibaba/happy-horse/v1.1/text-to-video \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
  "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
}'
```

```python Python theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

arguments = (
    {'prompt': 'A cinematic wide shot of ocean waves at sunset, with gentle camera '
               'movement.'}
)
result = higgsfield_client.subscribe(
    "alibaba/happy-horse/v1.1/text-to-video",
    arguments=arguments,
)
print(result["video"]["url"])
```

```typescript TypeScript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({ credentials: process.env.HF_CREDENTIALS });

const result = await higgsfield.subscribe("alibaba/happy-horse/v1.1/text-to-video", {
  input:
    {
      "prompt": "A cinematic wide shot of ocean waves at sunset, with gentle camera movement."
    },
  withPolling: true,
});

if (result.status === "completed") {
  console.log(result.video?.url);
}
```

## Input schema

**seed** `integer`

Seed used to control generation randomness.
Minimum: `1`.
Maximum: `2147483646`.

**prompt** `string` *required*

Write your prompt here

**duration** `integer` (default: 5)

Requested output duration in seconds.
Minimum: `3`.
Maximum: `15`.

**resolution** `string` (default: 1080p)

Output resolution tier.
Allowed values: `"720p"`, `"1080p"`.

**aspect\_ratio** `string` (default: 16:9)

Output width-to-height ratio.
Allowed values: `"16:9"`, `"9:16"`, `"1:1"`, `"4:3"`, `"3:4"`.

> **Complete JSON schema**
>
> ```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
> {
>   "type": "object",
>   "title": "Happy Horse",
>   "required": [
>     "prompt"
>   ],
>   "properties": {
>     "seed": {
>       "type": "integer",
>       "maximum": 2147483646,
>       "minimum": 1
>     },
>     "prompt": {
>       "type": "string",
>       "title": "Prompt",
>       "description": "Write your prompt here"
>     },
>     "duration": {
>       "type": "integer",
>       "title": "Duration",
>       "default": 5,
>       "maximum": 15,
>       "minimum": 3
>     },
>     "resolution": {
>       "enum": [
>         "720p",
>         "1080p"
>       ],
>       "type": "string",
>       "default": "1080p"
>     },
>     "aspect_ratio": {
>       "enum": [
>         "16:9",
>         "9:16",
>         "1:1",
>         "4:3",
>         "3:4"
>       ],
>       "type": "string",
>       "title": "Aspect Ratio",
>       "default": "16:9"
>     }
>   }
> }
> ```

## Response

Submission returns a request handle. Poll `status_url` until `status` is `completed`, or use [webhooks](/docs/how-to/webhooks).

```json Accepted theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "REQUEST_ID",
  "status_url": "https://api.higgsfield.ai/requests/REQUEST_ID/status",
  "cancel_url": "https://api.higgsfield.ai/requests/REQUEST_ID/cancel"
}
```

A completed response includes the following output fields:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "REQUEST_ID",
  "video": {
    "url": "https://example.com/output.mp4"
  }
}
```

See [idempotent requests](/docs/concepts/idempotency), [polling](/docs/concepts/polling), [request errors](/docs/concepts/errors) and [authentication](/docs/authentication) for shared request handling.


# Happy Horse 1.0 — Image to video API
Source: https://docs.higgsfield.ai/docs/models/happy-horse-1/image-to-video

Image to video with Happy Horse 1.0: request parameters, examples and response handling.

[← Happy Horse 1.0](/docs/models/happy-horse-1)

**Endpoint:** `POST https://api.higgsfield.ai/alibaba/happy-horse/image-to-video`

**Endpoint ID:** `alibaba/happy-horse/image-to-video`

[▶
Open API PlaygroundHappy Horse 1.0 · Image to video
↗](https://console.higgsfield.ai/models/alibaba%2Fhappy-horse%2Fimage-to-video/playground)

## Usage notes

* The prompt is optional. This endpoint accepts one first-frame image; it does not support a last-frame image.

## Quick start

Replace the example media URLs with p


# https://docs.higgsfield.ai/docs/guides/images.md
> ## Documentation Index
> Fetch the complete documentation index at: https://docs.higgsfield.ai/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Higgsfield API

> Generate images and videos through one authenticated, asynchronous API.

Higgsfield provides one integration point for generative media models. Submit a request to a model endpoint, then poll for the result or receive a webhook when processing finishes.

> **[Run your first request](/docs/quickstart.md)**
>
> Create credentials and complete a generation from submission to result.

> **[Get an API key](https://console.higgsfield.ai)**
>
> Create and manage server-side credentials in Higgsfield Console.

## Make a request

Every model uses the same authentication and asynchronous request lifecycle. The JSON body depends on the selected model.

Start with [Genjutsu motion transfer](/docs/models/genjutsu/motion-transfer.md). Replace the example media URLs with publicly accessible URLs for your own video and reference image. The source video must be at least 4 seconds long.

```bash Genjutsu theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield/genjutsu/motion-transfer/v1.0 \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{
    "video_url": "https://example.com/input.mp4",
    "image_urls": ["https://example.com/input.jpg"]
  }'
```

```bash SOUL V2 theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --request POST \
  --url https://api.higgsfield.ai/higgsfield-ai/soul/v2/standard \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --data '{
    "prompt": "Editorial portrait in soft daylight"
  }'
```

The API immediately returns a request identifier and links for checking or canceling the request.

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "status_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/status",
  "cancel_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/cancel"
}
```

## Choose your path

> **[Build a prototype](/docs/how-to/sdk.md)**
>
> Use the Python or TypeScript SDK to submit a request and wait for its result.

> **[Ship to production](/docs/concepts/requests.md)**
>
> Learn the request lifecycle, polling, webhooks, errors, and limits.

> **[Upload media](/docs/concepts/file-uploads.md)**
>
> Upload input files to Higgsfield storage before generation.

> [!NOTE]
>
> Output files are available for at least seven days. Download completed output to your own storage for long-term retention.


## Related topics

- [Support](/docs/help/support.md)
- [FAQ](/docs/help/faq.md)
- [How the API works](/docs/how-to/introduction.md)
- [Managing members](/docs/organizations/managing-members.md)
- [Model API Reference](/docs/models.md)


This documentation is built and hosted on [Mintlify](https://mintlify.com), a developer documentation platform.


# https://docs.higgsfield.ai/docs/quickstart.md
> ## Documentation Index
> Fetch the complete documentation index at: https://docs.higgsfield.ai/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Quickstart

> Submit a generation request and retrieve its result.

This guide uses the REST API so you can see the complete request lifecycle. It takes about five minutes.

## Prerequisites

* A [Higgsfield Console](https://console.higgsfield.ai) account
* An API key ID and secret
* `curl` and `jq`

> [!WARNING]
>
> API credentials grant access to your account and credits. Use them only in server-side code and never commit them to source control.

## 1. Configure credentials

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
export HF_API_KEY_ID="your-api-key-id"
export HF_API_KEY_SECRET="your-api-key-secret"
export IDEMPOTENCY_KEY=$(uuidgen | tr '[:upper:]' '[:lower:]')
```

## 2. Submit a generation

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
RESPONSE=$(curl --silent --show-error --fail-with-body \
  --request POST \
  --url https://api.higgsfield.ai/higgsfield-ai/soul/v2/standard \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" \
  --header "Content-Type: application/json" \
  --header "Idempotency-Key: ${IDEMPOTENCY_KEY}" \
  --data '{
    "prompt": "A quiet alpine lake at sunrise, editorial photography"
  }')

echo "$RESPONSE" | jq
export REQUEST_ID=$(echo "$RESPONSE" | jq --raw-output '.request_id')
```

The initial response has the `queued` status:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "queued",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "status_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/status",
  "cancel_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/cancel"
}
```

If submission times out before you receive this response, repeat it with the same `IDEMPOTENCY_KEY`. See [Idempotent requests](/docs/concepts/idempotency.md).

## 3. Check the result

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl --silent --show-error --fail-with-body \
  --url "https://api.higgsfield.ai/requests/${REQUEST_ID}/status" \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}" | jq
```

Repeat the status request until it reaches a terminal state. A completed image request returns:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "status": "completed",
  "request_id": "d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff",
  "status_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/status",
  "cancel_url": "https://api.higgsfield.ai/requests/d7e6c0f3-6699-4f6c-bb45-2ad7fd9158ff/cancel",
  "images": [
    {
      "url": "https://cdn.example.com/generated-image.jpg"
    }
  ]
}
```

The other terminal statuses are `failed`, `nsfw`, and `canceled`.

## Next steps

> **[Use an SDK](/docs/how-to/sdk.md)**
>
> Submit and wait for results with Python or TypeScript.

> **[Prepare for production](/docs/concepts/polling.md)**
>
> Add backoff, timeouts, terminal-state handling, and webhooks.


## Related topics

- [Soul ID — Create character API](/docs/models/soul-id/create-character.md)
- [Image Generation API](/docs/models/image-generation.md)
- [Video Generation API](/docs/models/video-generation.md)
- [Genjutsu — Motion transfer API](/docs/models/genjutsu/motion-transfer.md)
- [Genjutsu — Object swap API](/docs/models/genjutsu/object-swap.md)


This documentation is built and hosted on [Mintlify](https://mintlify.com), a developer documentation platform.


# https://docs.higgsfield.ai/docs/authentication.md
> ## Documentation Index
> Fetch the complete documentation index at: https://docs.higgsfield.ai/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Authentication

> Authenticate server-side API requests with your Higgsfield key and secret.

Create and manage API credentials in [Higgsfield Console](https://console.higgsfield.ai). Each credential consists of a key ID and a secret.

## Authorization header

Send both values in the `Authorization` header:

```http theme={"theme":{"light":"github-light","dark":"github-dark"}}
Authorization: Key YOUR_KEY_ID:YOUR_KEY_SECRET
```

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
curl https://api.higgsfield.ai/requests/REQUEST_ID/status \
  --header "Authorization: Key ${HF_API_KEY_ID}:${HF_API_KEY_SECRET}"
```

The API also accepts the legacy `hf-api-key` and `hf-secret` headers. New integrations should use the `Authorization` header.

## Keep credentials server-side

> [!WARNING]
>
> Do not call the API directly from browser or mobile application code. Anyone who can inspect the application can extract its API secret and use your account.

* Store credentials in a secrets manager or encrypted environment variables.
* Use separate credentials for development and production.
* Never include credentials in URLs, logs, screenshots, or support messages.
* Rotate a credential immediately if it may have been exposed.

## Authentication errors

Missing, malformed, or invalid credentials return `401 Unauthorized`:

```json theme={"theme":{"light":"github-light","dark":"github-dark"}}
{
  "detail": "Invalid credentials"
}
```

Authentication identifies the account, but individual models may have separate access restrictions. A model unavailable to the authenticated account can return `404`, `423`, or `503` depending on its operational state.


## Related topics

- [FAQ](/docs/help/faq.md)
- [How the API works](/docs/how-to/introduction.md)
- [Cinema Studio 4.0 — Generate API](/docs/models/cinema-studio-4/generate.md)
- [Genjutsu — Motion transfer API](/docs/models/genjutsu/motion-transfer.md)
- [Genjutsu — Object swap API](/docs/models/genjutsu/object-swap.md)


This documentation is built and hosted on [Mintlify](https://mintlify.com), a developer documentation platform.


# https://docs.higgsfield.ai/docs/how-to/sdk.md
> ## Documentation Index
> Fetch the complete documentation index at: https://docs.higgsfield.ai/docs/llms.txt
> Use this file to discover all available pages before exploring further.

# Client libraries

> Use the official Python and TypeScript SDKs.

Official SDKs handle authentication, submission, polling, cancellation, and file uploads. Use them only in trusted server-side environments.

> **[Python](https://github.com/higgsfield-ai/higgsfield-client)**
>
> Synchronous and asynchronous APIs for Python 3.8+.

> **[Node.js and TypeScript](https://github.com/higgsfield-ai/higgsfield-js)**
>
> Typed server-side client with automatic polling and retries.

## Python

### Install

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
pip install higgsfield-client
```

### Configure credentials

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
export HF_KEY="your-api-key-id:your-api-key-secret"
```

### Submit and wait

```python Synchronous theme={"theme":{"light":"github-light","dark":"github-dark"}}
import higgsfield_client

result = higgsfield_client.subscribe(
    "higgsfield-ai/soul/v2/standard",
    arguments={
        "prompt": "Editorial portrait in soft daylight",
    },
)

print(result["images"][0]["url"])
```

```python Asynchronous theme={"theme":{"light":"github-light","dark":"github-dark"}}
import asyncio

import higgsfield_client


async def main():
    result = await higgsfield_client.subscribe_async(
        "higgsfield-ai/soul/v2/standard",
        arguments={
            "prompt": "Editorial portrait in soft daylight",
        },
    )
    print(result["images"][0]["url"])


asyncio.run(main())
```

Use `submit` or `submit_async` when you need a request controller for explicit polling, status checks, or cancellation. The Python SDK also provides `upload`, `upload_file`, and `upload_image` helpers.

## Node.js and TypeScript

### Install

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
npm install @higgsfield/client
```

### Configure credentials

```bash theme={"theme":{"light":"github-light","dark":"github-dark"}}
export HF_CREDENTIALS="your-api-key-id:your-api-key-secret"
```

### Submit and wait

```typescript theme={"theme":{"light":"github-light","dark":"github-dark"}}
import { config, higgsfield } from "@higgsfield/client/v2";

config({
  credentials: process.env.HF_CREDENTIALS,
});

const result = await higgsfield.subscribe(
  "higgsfield-ai/soul/v2/standard",
  {
    input: {
      prompt: "Editorial portrait in soft daylight",
    },
    withPolling: true,
  },
);

if (result.status === "completed") {
  console.log(result.images?.[0]?.url);
}
```

The v2 TypeScript client is server-side only and blocks browser use to prevent credential exposure.

## Choose an integration style

| Requirement | Recommended API |
| - | - |
| Script or prototype | `subscribe` / `subscribe_async` |
| Worker with explicit lifecycle control | `submit` / `submit_async` |
| Existing request ID | `status`, `result`, or `cancel` |
| Production event-driven integration | Submit with a webhook and keep status polling as recovery |

See the [Python SDK repository](https://github.com/higgsfield-ai/higgsfield-client) and [TypeScript SDK repository](https://github.com/higgsfield-ai/higgsfield-js) for the complete client APIs.


## Related topics

- [FAQ](/docs/help/faq.md)
- [Support](/docs/help/support.md)
- [Rate limits](/docs/concepts/rate-limits.md)
- [Idempotent requests](/docs/concepts/idempotency.md)
- [Genjutsu — Motion transfer API](/docs/models/genjutsu/motion-transfer.md)


This documentation is built and hosted on [Mintlify](https://mintlify.com), a developer documentation platform.