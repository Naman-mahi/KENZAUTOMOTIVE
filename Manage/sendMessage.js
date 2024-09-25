 function sendMessage = ()=> {
    const input = document.getElementById('inputMessage');
    const messageText = input.value.trim();
    if (messageText) {
        displayMessage(messageText, 'user');
        input.value = '';

        setTimeout(() => {
            let agentResponse = "";

            if (messageText.toLowerCase().includes("hello")) {
                agentResponse = "Hello there! How can I help you today?";
            } else if (messageText.toLowerCase().includes("price") || messageText.toLowerCase().includes("cost")) {
                agentResponse = "Our pricing varies depending on the project scope and complexity. Please tell me more about your needs, and I can provide you with a customized quote.";
            } else if (messageText.toLowerCase().includes("services") || messageText.toLowerCase().includes("what do you do")) {
                agentResponse = "We offer a wide range of software services, including application development, website design & development, e-commerce solutions, and more. What are you interested in?";
            } else if (messageText.toLowerCase().includes("app development") || messageText.toLowerCase().includes("mobile app")) {
                agentResponse = "We excel at building high-quality mobile and web applications. Do you have a specific platform in mind (iOS, Android, or web)?";
            } else if (messageText.toLowerCase().includes("website") || messageText.toLowerCase().includes("web design")) {
                agentResponse = "We can create stunning and functional websites tailored to your business needs. Do you have a particular design style in mind?";
            } else if (messageText.toLowerCase().includes("e-commerce") || messageText.toLowerCase().includes("online store")) {
                agentResponse = "We can help you set up a robust and user-friendly e-commerce store. Are you looking to integrate with any specific platforms?";
            } else if (messageText.toLowerCase().includes("Naman Khobragade")) {
                agentResponse = "Naman is our founder and CEO. He's a visionary leader with a passion for technology and innovation!";
            } else {
                agentResponse = "Thanks for your message! I'm still under development, but I'm learning more every day. Feel free to ask me anything about our services.";
            }

            displayMessage(agentResponse, 'agent');
        }, 1000);
        saveMessages();
    }
}



else if (
    lowerText.includes("price") ||
    lowerText.includes("cost") ||
    lowerText.includes("fees")
  ) {
    agentResponse =
      "Our pricing varies depending on the project scope and complexity. Please tell me more about your needs, and I can provide you with a customized quote.";
  } else if (
    lowerText.includes("services") ||
    lowerText.includes("what do you do") ||
    lowerText.includes("offer")
  ) {
    agentResponse =
      "We offer a wide range of software services, including application development, website design & development, e-commerce solutions, and more. What are you interested in?";
  } else if (
    lowerText.includes("app development") ||
    lowerText.includes("mobile app")
  ) {
    agentResponse =
      "We excel at building high-quality mobile and web applications. Do you have a specific platform in mind (iOS, Android, or web)?";
  } else if (
    lowerText.includes("website") ||
    lowerText.includes("web design")
  ) {
    agentResponse =
      "We can create stunning and functional websites tailored to your business needs. Do you have a particular design style in mind?";
  } else if (
    lowerText.includes("e-commerce") ||
    lowerText.includes("online store")
  ) {
    agentResponse =
      "We can help you set up a robust and user-friendly e-commerce store. Are you looking to integrate with any specific platforms?";
  } else if (lowerText.includes("Naman Khobragade")) {
    agentResponse =
      "Naman is our founder and CEO. He's a visionary leader with a passion for technology and innovation!";
  } else if (
    lowerText.includes("support") ||
    lowerText.includes("help")
  ) {
    agentResponse =
      "We're here to help! Please provide more details about the support you need.";
  } else if (
    lowerText.includes("contact") ||
    lowerText.includes("reach")
  ) {
    agentResponse =
      "You can reach us at contact@example.com or through our website's contact form.";
  } else if (lowerText.includes("hours") || lowerText.includes("open")) {
    agentResponse =
      "Our office hours are Monday to Friday, 9 AM to 5 PM. How can I assist you further?";
  } else if (
    lowerText.includes("location") ||
    lowerText.includes("address")
  ) {
    agentResponse =
      "We are located at 123 Main Street, Hometown, USA. Feel free to visit us!";
  } else if (
    lowerText.includes("feedback") ||
    lowerText.includes("review")
  ) {
    agentResponse =
      "We value your feedback! Please let us know what you think about our services.";
  } else if (
    lowerText.includes("careers") ||
    lowerText.includes("jobs")
  ) {
    agentResponse =
      "We're always looking for talented individuals! Check our careers page for current openings.";
  } else if (
    lowerText.includes("portfolio") ||
    lowerText.includes("projects")
  ) {
    agentResponse =
      "You can view our portfolio on our website. It showcases our recent projects and achievements.";
  } else if (
    lowerText.includes("testimonials") ||
    lowerText.includes("reviews")
  ) {
    agentResponse =
      "Our clients often share their experiences on our testimonials page. Would you like to know more?";
  } else if (
    lowerText.includes("refund") ||
    lowerText.includes("policy")
  ) {
    agentResponse =
      "Our refund policy varies by project type. Please check our website or provide more details for specific information.";
  } else if (
    lowerText.includes("security") ||
    lowerText.includes("data protection")
  ) {
    agentResponse =
      "We take security seriously. Our services comply with the latest data protection regulations to keep your information safe.";
  } else if (
    lowerText.includes("integration") ||
    lowerText.includes("third-party")
  ) {
    agentResponse =
      "We offer various integration services with popular third-party platforms. Which platform are you interested in?";
  } else if (
    lowerText.includes("customization") ||
    lowerText.includes("custom")
  ) {
    agentResponse =
      "We can tailor our solutions to meet your specific requirements. What features are you looking for?";
  } else if (
    lowerText.includes("training") ||
    lowerText.includes("support")
  ) {
    agentResponse =
      "We provide training and support to ensure you get the most out of our services. Would you like to know more?";
  } else if (
    lowerText.includes("partnership") ||
    lowerText.includes("collaboration")
  ) {
    agentResponse =
      "We love partnering with other businesses! Please share your ideas, and we can discuss potential collaboration.";
  } else if (
    lowerText.includes("updates") ||
    lowerText.includes("news")
  ) {
    agentResponse =
      "Stay tuned for our latest updates! You can also subscribe to our newsletter on our website.";
  } else if (
    lowerText.includes("events") ||
    lowerText.includes("webinars")
  ) {
    agentResponse =
      "We host various events and webinars. Check our events page for upcoming schedules!";
  } else if (
    lowerText.includes("terms") ||
    lowerText.includes("conditions")
  ) {
    agentResponse =
      "You can find our terms and conditions on our website. Would you like me to summarize them?";
  } else if (
    lowerText.includes("privacy") ||
    lowerText.includes("policy")
  ) {
    agentResponse =
      "We have a comprehensive privacy policy detailing how we handle your data. You can find it on our website.";
  } else if (
    lowerText.includes("payment") ||
    lowerText.includes("methods")
  ) {
    agentResponse =
      "We accept various payment methods, including credit cards and bank transfers. Please check our payment page for details.";
  } else if (lowerText.includes("demo") || lowerText.includes("trial")) {
    agentResponse =
      "We offer demos and trial periods for many of our services. Would you like to schedule one?";
  } else if (
    lowerText.includes("technical support") ||
    lowerText.includes("issues")
  ) {
    agentResponse =
      "If you're experiencing technical issues, please provide details so we can assist you better.";
  } else if (
    lowerText.includes("updates") ||
    lowerText.includes("new features")
  ) {
    agentResponse =
      "We regularly update our services. You can check our blog for the latest features and enhancements.";
  } else if (
    lowerText.includes("community") ||
    lowerText.includes("forum")
  ) {
    agentResponse =
      "Join our community forum to connect with other users and share experiences!";
  } else if (
    lowerText.includes("newsletter") ||
    lowerText.includes("subscribe")
  ) {
    agentResponse =
      "You can subscribe to our newsletter on our website for updates and news!";
  } else if (
    lowerText.includes("usage") ||
    lowerText.includes("guidelines")
  ) {
    agentResponse =
      "We provide usage guidelines for our services. You can find detailed documentation on our website.";
  } else if (
    lowerText.includes("api") ||
    lowerText.includes("integration")
  ) {
    agentResponse =
      "We offer API access for integration with your systems. Would you like more information?";
  } else if (
    lowerText.includes("cloud services") ||
    lowerText.includes("hosting")
  ) {
    agentResponse =
      "We provide secure cloud hosting services. Would you like to learn more about our hosting plans?";
  } else if (
    lowerText.includes("mobile compatibility") ||
    lowerText.includes("responsive")
  ) {
    agentResponse =
      "All our services are designed to be mobile-friendly and responsive. Do you have a specific requirement in mind?";
  } else if (
    lowerText.includes("analytics") ||
    lowerText.includes("tracking")
  ) {
    agentResponse =
      "We provide analytics tools to help you track your performance. Would you like to know more about our analytics services?";
  } else if (
    lowerText.includes("advertising") ||
    lowerText.includes("marketing")
  ) {
    agentResponse =
      "We offer various marketing and advertising solutions. What kind of services are you interested in?";
  } else if (
    lowerText.includes("scheduling") ||
    lowerText.includes("appointment")
  ) {
    agentResponse =
      "You can schedule an appointment through our website or directly here. When would you like to meet?";
  } else if (
    lowerText.includes("faq") ||
    lowerText.includes("questions")
  ) {
    agentResponse =
      "You can find answers to common questions on our FAQ page. Is there something specific you'd like to know?";
  } else if (
    lowerText.includes("international") ||
    lowerText.includes("global")
  ) {
    agentResponse =
      "We provide services internationally. Please share your location, and we can discuss availability.";
  } else if (
    lowerText.includes("community") ||
    lowerText.includes("users")
  ) {
    agentResponse =
      "Join our user community for tips, tricks, and support from other users!";
  } 