document.addEventListener("DOMContentLoaded", function () {
  // Create chat widget elements
  const widgetContainer = document.createElement("div");
  widgetContainer.id = "chatWidget";
  widgetContainer.innerHTML = `
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

            #chatWidget {
                position: fixed;
                bottom: 20px;
                right: 20px;
                width: 350px; /* Reduced width */
                max-height: 500px;
                border-radius: 10px; 
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
                display: none;
                background-color: #fff;
                z-index: 9999; 
                font-family: 'Poppins', sans-serif;
            }
            .chat-header {
                background-color: #FCEEF3; /* Green header */
                color: white;
                padding: 12px 15px; /* Adjusted padding */
                border-radius: 10px 10px 0 0;
                display: flex;
                align-items: center;
            }
            .chat-header img { 
                width: 30px;
                height: 30px;
                border-radius: 50%;
                margin-right: 8px;
            }
            .chat-header span {
                font-weight: bold;
            }
            .chat-body {
                height: 350px;
                overflow-y: auto;
                padding: 10px 15px;
                background: #f8f8f8; /* Subtle background */
            }
            .chat-body::-webkit-scrollbar {
                width: 3px; 
            }
            .chat-body::-webkit-scrollbar-thumb {
                background-color: #28a745;  /* Green scrollbar */
                border-radius: 4px;
            }
            .message {
                display: flex;
                align-items: flex-end;
                margin-bottom: 10px;
                font-size: small;
            }
            .message-text {
                background-color: #fff; /* White message bubbles */
                color: #333;
                padding: 8px 12px;
                border-radius: 18px;
                max-width: 75%;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            }
            .user-message {
                justify-content: flex-end;
            }
            .user-message .message-text {
                background-color: #f2edec; /* User message */
                color: black;
            }
            .agent-message {
                justify-content: flex-start;
            }
            .agent-message .message-text {
                background-color: #E7EEEE; /* Light gray agent message */
            }
            .chat-input {
                display: flex;
                padding: 5px;
                border-top: 1px solid #ddd;
                background-color: #f8f9fa;
                border-radius: 0 0 10px 10px;
            }
            #inputMessage {
                flex: 1;
                margin-right: 1px;
                border: none;
                padding: 10px 15px;
                border-radius: 20px;
                background-color: #eee; 
            }
            #inputMessage:focus {
                outline: none;
            }
            .chat-button {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background-color: #28a745; /* Green button */
                color: white;
                border: none;
                border-radius: 50%; 
                padding: 15px;
                cursor: pointer;
                z-index: 9999; 
                width: 60px; 
                height: 60px; 
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Softer shadow */
            }
            .chat-button i {
                font-size: 20px;
            }
            .developer {
                font-size: small;
            }
        </style>
        <div class="d-flex align-items-center justify-content-between chat-header">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6hn5KYtSp4HnteAMMJU0AfLiTn6IKsRXrrg&s" alt="Agent" class="me-2">
            <span class="text-dark">Chat with Us</span>
            <a class="btn-close" onclick="toggleChat()" aria-label="Close"></a>
        </div>
        <div class="chat-body">
            <div id="messages" class="messages"></div>
        </div>
        <div class="chat-input">
            <input type="text" id="inputMessage" placeholder="Type your message..." onkeypress="handleKeyPress(event)" />
            <a class="no-decoration btn" onclick="sendMessage()">
                <i class="fas fa-paper-plane"></i> 
            </a>
        </div>
        <div class="text-center developer">
            <small>Namanmahi❣️</small>
        </div>
    `;
  document.body.appendChild(widgetContainer);

  const chatButton = document.createElement("button");
  chatButton.className = "chat-button";
  chatButton.innerHTML = '<i class="fas fa-comment"></i>';
  chatButton.onclick = toggleChat;
  document.body.appendChild(chatButton);

  if (sessionStorage.getItem("chatVisible") === "true") {
    widgetContainer.style.display = "block";
    chatButton.style.display = "none";
  }

  loadMessages();

  function toggleChat() {
    const chatWidget = document.getElementById("chatWidget");
    const isVisible = chatWidget.style.display === "block";
    chatWidget.style.display = isVisible ? "none" : "block";
    chatButton.style.display = isVisible ? "block" : "none";
    sessionStorage.setItem("chatVisible", !isVisible);
  }

  function handleKeyPress(event) {
    if (event.key === "Enter") {
      sendMessage();
    }
  }

  function sendMessage() {
    const input = document.getElementById("inputMessage");
    const messageText = input.value.trim();
    if (messageText) {
      displayMessage(messageText, "user");
      input.value = "";

      setTimeout(() => {
        let agentResponse = "";

        const lowerText = messageText.toLowerCase();

        if (
          lowerText.includes("hello") ||
          lowerText.includes("hi") ||
          lowerText.includes("hey")
        ) {
          agentResponse = "Hello there! How can I help you today?";
        }else if (
            lowerText.includes("sunil") ||
            lowerText.includes("khobragade") ||
            lowerText.includes("naman") ||
            lowerText.includes("naman khobragade") ||
            lowerText.includes("developer") ||
            lowerText.includes("creator") ||
            lowerText.includes("founder")
        ) {
          agentResponse =
            "Sunil Khobragade is the brilliant mind behind my development! He’s dedicated to creating a seamless experience for you.";
        } else if (
          lowerText.includes("video tutorials") ||
          lowerText.includes("learning")
        ) {
          agentResponse =
            "We have a series of video tutorials available on our website. Would you like to see a specific topic?";
        } else {
          agentResponse =
            "Thanks for your message! I'm still under development, but I'm learning more every day. Feel free to ask me anything about our services.";
        }

        displayMessage(agentResponse, "agent");
      }, 1000);
      saveMessages();
    }
  }

  function displayMessage(text, sender) {
    const messagesContainer = document.getElementById("messages");
    const messageDiv = document.createElement("div");
    messageDiv.className = `message ${sender}-message`;
    messageDiv.innerHTML = `<div class="message-text">${text}</div>`;
    messagesContainer.appendChild(messageDiv);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
  }

  function saveMessages() {
    const messagesContainer = document.getElementById("messages");
    sessionStorage.setItem("chatMessages", messagesContainer.innerHTML);
  }

  function loadMessages() {
    const messagesContainer = document.getElementById("messages");
    const savedMessages = sessionStorage.getItem("chatMessages");
    if (savedMessages) {
      messagesContainer.innerHTML = savedMessages;
    }
  }

  window.toggleChat = toggleChat;
  window.sendMessage = sendMessage;
  window.handleKeyPress = handleKeyPress;
});
