let AccessKey;
let SecretKey;
let rekognition;

const fetchAwsCredentials = async () => {
    try {
        const response = await fetch("/api/get-aws-creadentials", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'XSRF-TOKEN': document.cookie.match(new RegExp(`(^| )XSRF-TOKEN=([^;]+)`))[2]
            }
        });

        if (!response.ok) {
            throw new Error(`Failed to fetch credentials: ${response.statusText}`);
        }

        const data = await response.json();
        console.log("Fetched credentials:", data);

        AccessKey = data.key;
        SecretKey = data.secret;

        AWS.config.update({
            accessKeyId: AccessKey,
            secretAccessKey: SecretKey,
            region: data.region || "us-east-2", // Fallback region
        });

        console.log("AWS configured successfully");

        rekognition = new AWS.Rekognition();
    } catch (error) {
        console.error("Error fetching AWS credentials:", error);
    }
};

(async () => {
    await fetchAwsCredentials();

    if (!rekognition) {
        console.error("Failed to initialize AWS services");
    } else {
        console.log("AWS Rekognition is ready to use");
    }
})();

console.log("AccessKey:", AccessKey);
console.log("SecretKey:", SecretKey);
console.log("AWS Config Region:", AWS.config.region);

function allowCameraAccess(e) {
    const deviceSize = window.innerWidth < 768 ? "mobile" : "desktop";
    navigator.mediaDevices
        .getUserMedia({
            video: {
                width: { min: deviceSize === "mobile" ? 480 : 640 },
                height: { min: deviceSize === "mobile" ? 640 : 480 },
            },
        })
        .then(function (stream) {
            document.getElementById("videoFeedContainer").style.display =
                "block";
            document.getElementById("cameraFeed").srcObject = stream;
            document.getElementById("grantDemo").remove();
            document.getElementById("title").innerText =
                "Camera Access Granted";
            e.remove();
        })
        .catch(function (err) {
            console.log("Error: " + err);
        });
}

async function captureImage() {
    const video = document.getElementById("cameraFeed");
    const canvas = document.createElement("canvas");
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    const context = canvas.getContext("2d");
    context.drawImage(video, 0, 0);
    return canvas.toDataURL("image/jpeg");
}

async function detectFace() {
    const progressElement = document.getElementById("progress");
    progressElement.innerText = "Detecting face...";

    try {
        const base64Image = await captureImage();
        const imageBytes = base64Image.split(",")[1]; // Extract the base64 string
        const byteArray = new Uint8Array(
            atob(imageBytes)
                .split("")
                .map((char) => char.charCodeAt(0))
        );
        const blob = new Blob([byteArray], { type: "image/jpeg" });
        const userId = document.querySelector('input[name="user_id"]').value;

        const params = {
            Image: {
                Bytes: byteArray,
            },
            Attributes: ["ALL"], // You can specify 'DEFAULT' or 'ALL' for attributes
        };

        const token = document.querySelector('input[name="_token"]').value;

        rekognition.detectFaces(params, (err, data) => {
            if (err) {
                console.error(err);
                updateProgress("Error in face detection", "red");
                return;
            }

            handleFaceDetection(data, blob, token, userId);
        });
    } catch (error) {
        console.error("Error capturing image:", error);
        updateProgress("Error capturing image", "red");
    }
}

function handleFaceDetection(data, blob, token, userId) {
    if (data.FaceDetails.length === 0) {
        updateProgress("No face detected", "red");
        return;
    }

    if (data.FaceDetails.length > 1) {
        updateProgress("Multiple faces detected", "red");
        return;
    }

    const formData = new FormData();
    formData.append("face", blob);
    formData.append("_token", token);
    formData.append("user_id", userId);
    formData.append("faceMeta", JSON.stringify(data.FaceDetails[0]));

    axios("/api/face/upload", {
        method: "POST",
        headers: {
            "Content-Type": "multipart/form-data",
            mustard_seed_charity_session: getCookieValue(
                "mustard_seed_charity_session"
            ),
            "X-CSRF-TOKEN": getCookieValue("XSRF-TOKEN"),
        },
        data: formData,
    })
        .then((data) => {
            const message = data.data.success
                ? "Face detected"
                : "Face not detected";
            const color = data.data.success ? "green" : "red";
            Livewire.dispatch("nextStep");
            updateProgress(message, color);
        })
        .catch((error) => {
            console.error("Error:", error);
            updateProgress("Error uploading face data", "red");
        });
}

function updateProgress(message, color) {
    const progressElement = document.getElementById("progress");
    progressElement.innerText = message;
    progressElement.style.color = color;
}

function getCookieValue(name) {
    const match = document.cookie.match(new RegExp(`(^| )${name}=([^;]+)`));
    return match ? match[2] : null;
}

function backStep() {
    Livewire.dispatch("backStep");
}
