using System;

namespace _302p3._0 
{ 
    class Program
    {

        static float income;
        static void Main(string[] args)
        {
            while (true)
            {
                float stax;
                float ptax;
                float tax;
                float mpfIncome;
                float married;
                float hIncome;
                float wIncome;
                //Console.WriteLine("Hello World!");

                Console.WriteLine("Are you single? yes:1, no:2");
                if (Console.ReadLine() == "2")
                {
                    married = 264000;
                    Console.WriteLine("Input your self total salary!");
                    wIncome = Convert.ToInt32(Console.ReadLine());
                    Console.WriteLine("Input your spouse total salary!");
                    hIncome = Convert.ToInt32(Console.ReadLine());
                    float sinTax = Single(wIncome) + Single(hIncome);
                    tax = Couplet(wIncome, hIncome);
                    Console.WriteLine("Separate Taxation " + sinTax.ToString());
                    Console.WriteLine("Joint Assessment " + tax.ToString());
                    if (tax <= sinTax)
                    {
                        Console.WriteLine("Your tax should count together: " + tax.ToString());
                    }
                    else
                    {
                        Console.WriteLine("Your tax should be paid seperately: " + sinTax.ToString());
                    }

                }
                else
                {
                    Console.WriteLine("Input your total salary!");
                    int intTemp = Convert.ToInt32(Console.ReadLine());
                    income = (float)intTemp;
                    tax = Single(income);

                    Console.WriteLine("Your tax: " + tax.ToString());
                }
            }

        }
        static int Couplet(float wIncome, float hIncome)
        {
            float married = 264000;
            float mpfIncome = Mpf(wIncome) + Mpf(hIncome);

            Console.WriteLine("Your Mpf: " + (wIncome - Mpf(wIncome)));
            Console.WriteLine("Your spouse Mpf: " + (hIncome - Mpf(hIncome)));
            float stax = StanTax(mpfIncome);
            mpfIncome -= married;
            float ptax = ProTax(mpfIncome);
            if (stax < ptax)
            {
                if (stax <= 0)
                    return 0;
                return (int)stax;
            }
            else
            {
                if (ptax <= 0)
                    return 0;
                return (int)ptax;
            }

        }
        static int Single(float income)
        {
            float married = 132000;
            float mpfIncome = Mpf(income);
            float stax = StanTax(mpfIncome);
            Console.WriteLine("Mpf: " + (income - mpfIncome));
            mpfIncome -= married;
            float ptax = ProTax(mpfIncome);
            if (stax < ptax)
            {
                if (stax <= 0)
                    return 0;
                Console.WriteLine("Standard Tax ");
                return (int)stax;
            }
            else
            {
                if (ptax <= 0)
                    return 0;
                Console.WriteLine("Progressive Tax ");
                return (int)ptax;
            }
        }
        static float StanTax(float income)
        {
            float tax;
            tax = income * 0.15f;
            return tax;
        }
        static float ProTax(float income)
        {
            float tax;

            if (income >= 200000)
            {
                tax = 16000;
                income -= 200000;
                tax += income * 0.17f;
                return tax;
            }
            else if (income > 150000)
            {
                tax = 9000;
                income -= 150000;
                tax += income *= 0.14f;
                return tax;
            }
            else if (income > 100000)
            {
                tax = 4000;
                income -= 100000;
                tax += income *= 0.10f;
                return tax;
            }
            else if (income > 50000)
            {
                tax = 1000;
                income -= 50000;
                tax += income *= 0.06f;
                return tax;
            }
            else
            {
                tax = 0;
                tax += income *= 0.02f;
                return tax;
            }

        }
        static float Mpf(float income)
        {
            float x;
            income /= 12;
            if (income < 7100)
            {
                return income * 12;
            }
            else if (income < 30000)
            {
                x = income * 0.05f;

                return (income - x) * 12;
            }
            else
            {

                return (income - 1500) * 12;
            }

        }

    }
}

