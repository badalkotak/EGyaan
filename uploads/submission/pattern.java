class pattern
{
	public static void main(String Args[])
	{
		int i,j,space,star,stars,k,l,spaces;star=0;stars=3;
		for(i=3;i>0;i--)
		{
			star++;
			for(space=i;space>0;space--)
			{
				System.out.print(" ");
			}
			
			for(j=0;j<star;j++)
			{
				System.out.print("* ");
			}
			System.out.println();
		}

		for(k=0;k<2;k++)
		{
			stars--;
			for(spaces=0;spaces<=k;spaces++)
			{
				System.out.print(" ");
			}

			for(l=stars;l>0;l--)
			{
				System.out.print(" *");
			}
			System.out.println();
		}
	}
}
