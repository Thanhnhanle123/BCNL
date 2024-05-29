const bayes = require('bayes');

// Tạo mô hình Naive Bayes
const classifier = bayes();

// Dữ liệu huấn luyện
const trainingData = [
  { weather: 'sunny', region: 'north', drink: 'lemonade', revenue: 200, quantity: 100 },
  { weather: 'sunny', region: 'north', drink: 'lemonade', revenue: 200, quantity: 100 },
  { weather: 'sunny', region: 'north', drink: 'lemonade', revenue: 200, quantity: 100 },
  { weather: 'sunny', region: 'north', drink: 'lemonade', revenue: 200, quantity: 100 },
  { weather: 'sunny', region: 'north', drink: 'lemonade', revenue: 200, quantity: 100 },
  { weather: 'sunny', region: 'north', drink: 'coffee', revenue: 400, quantity: 100 },
  { weather: 'sunny', region: 'north', drink: 'coffee', revenue: 200, quantity: 100 },
  { weather: 'sunny', region: 'north', drink: 'coffee', revenue: 200, quantity: 100 },
  { weather: 'sunny', region: 'north', drink: 'coffee', revenue: 200, quantity: 100 },
  { weather: 'sunny', region: 'south', drink: 'iced tea', revenue: 450, quantity: 150 },
  { weather: 'rainy', region: 'north', drink: 'coffee', revenue: 800, quantity: 200 },
  { weather: 'rainy', region: 'south', drink: 'hot chocolate', revenue: 600, quantity: 120 },
  // Thêm dữ liệu khác
];

// Hàm huấn luyện mô hình với dữ liệu
const trainModel = async () => {
  for (const item of trainingData) {
    const features = `${item.weather} ${item.region}`;
    await classifier.learn(features, item.drink);
  }
};

// Hàm tính toán doanh thu và số lượng dự kiến
const calculateRevenueAndQuantity = (predictedDrink) => {
  const filteredData = trainingData.filter(item => item.drink === predictedDrink);
  const totalRevenue = filteredData.reduce((sum, item) => sum + item.revenue, 0);
  const totalQuantity = filteredData.reduce((sum, item) => sum + item.quantity, 0);
  const averageRevenue = totalRevenue / filteredData.length;
  const averageQuantity = totalQuantity / filteredData.length;

  return { averageRevenue, averageQuantity };
};

// Hàm tính toán tỷ lệ phần trăm so với tổng
const calculatePercentages = (averageRevenue, averageQuantity) => {
  const totalRevenue = trainingData.reduce((sum, item) => sum + item.revenue, 0);
  const totalQuantity = trainingData.reduce((sum, item) => sum + item.quantity, 0);

  const revenuePercentage = (averageRevenue / totalRevenue) * 100;
  const quantityPercentage = (averageQuantity / totalQuantity) * 100;

  return { revenuePercentage, quantityPercentage };
};

// Hàm chạy dự đoán và tính toán
const runPrediction = async () => {
  await trainModel();

  // Mẫu kiểm tra
  const testSample = { weather: 'sunny', region: 'north' }; // Thời tiết nắng và khu vực phía Bắc
  const features = `${testSample.weather} ${testSample.region}`;
  const prediction = await classifier.categorize(features);

  const { averageRevenue, averageQuantity } = calculateRevenueAndQuantity(prediction);
  const { revenuePercentage, quantityPercentage } = calculatePercentages(averageRevenue, averageQuantity);

  console.log(`Predicted drink: ${prediction}`);
  console.log(`Predicted average daily revenue: ${averageRevenue}`);
  console.log(`Predicted average daily quantity: ${averageQuantity}`);
  console.log(`Revenue percentage: ${revenuePercentage.toFixed(2)}%`);
  console.log(`Quantity percentage: ${quantityPercentage.toFixed(2)}%`);
};

// Chạy hàm dự đoán
runPrediction();
