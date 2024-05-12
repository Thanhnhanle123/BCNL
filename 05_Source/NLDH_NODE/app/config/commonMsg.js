class CommonMsg {
    constructor(apiMsg) {
        this.apiMsg = apiMsg;
    }

    apiStatus(data) {
        const HTTP_STATUS_CODES = {
            OK: {
                code: 200,
                message: "OK"
            },
            CREATED: {
                code: 201,
                message: "CREATED"
            },
            NO_CONTENT: {
                code: 204,
                message: "NO CONTENT"
            },
            BAD_REQUEST: {
                code: 400,
                message: "BAD REQUEST"
            },
            UNAUTHORIZED: {
                code: 401,
                message: "UNAUTHORIZED"
            },
            FORBIDDEN: {
                code: 403,
                message: "FORBIDDEN"
            },
            NOT_FOUND: {
                code: 404,
                message: "NOT FOUND"
            },
            METHOD_NOT_ALLOWED: {
                code: 405,
                message: "METHOD NOT ALLOWED"
            },
            CONFLICT: {
                code: 409,
                message: "CONFLICT"
            },
            INTERNAL_SERVER_ERROR: {
                code: 500,
                message: "CONFLICT"
            }
        };
        return {
            code: HTTP_STATUS_CODES[this.apiMsg].code,
            message: HTTP_STATUS_CODES[this.apiMsg].message,
            data: data
        }
    }

    // Add more constants as needed
}

module.exports = CommonMsg;
