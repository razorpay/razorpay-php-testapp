---
title: Documents Entity
description: Know about documents entity parameters and their description.
---

# Documents Entity

## Documents Entity

The Documents entity has the following parameters:

### Response

```json: Entity
{
  "id":"doc_EsyWjHrfzb59Re",
  "entity":"document",
  "purpose":"dispute_evidence",
  "name":"file_19_18_2020.jpg",
  "mime_type":"image/png",
  "size":2863,
  "created_at":1590604200
}
```

### Parameters

`id`
: `string` The unique identifier of the document uploaded.

`entity`
: `string` Indicates the type of entity. In this case, it is `document`.

`purpose`
: `string` The reason you are uploading this document. Here, it is `dispute_evidence`.

`size`
: `integer` Indicates the size of the document in bytes.

`mime_type`
: `string` Indicates the nature and format in which the document is uploaded. Possible values are:
  - image/jpg
  - image/jpeg
  - image/png
  - application/pdf

`created_at`
: `integer` Unix timestamp at which the document was uploaded.
